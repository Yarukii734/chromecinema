<?php

namespace App\Livewire\Mozi;

use App\Mail\CartEmail;
use Exception;
use PDOException;
use Stripe\Stripe;
use App\Models\Log;
use App\Models\Cart;
use App\Models\User;
use App\Models\Snack;
use App\Models\Movies;
use Livewire\Component;
use Stripe\Checkout\Session;
use Livewire\Attributes\Title;
use App\Models\SnackCategories;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\Collection;

#[Title('Kosár')]
#[Layout('layouts.fomozi')]
class Kosar extends Component
{
    public ?User $user;
    public ?Collection $snacks,
        $categories,
        $cartItems,
        $movies;
    public ?int $totalPrice,
        $totalCartCount;
    public ?string $selectedCategory;

    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
        $this->categories = SnackCategories::all();
        if ($this->categories->isNotEmpty()) {
            $this->selectedCategory = $this->categories->first()->id;
            $this->snacks = Snack::where('category_id', $this->selectedCategory)->get();
        }

        $this->loadCart();

        // Ne reseteld a végösszeget, ha nem sikerült a vásárlás
        if (request()->query('stripe_return') == 1) {
            if (
                request()->query('success') == 1 &&
                request()->query('token')
            ) {
                $movieQuantities = [];
                $snackQuantities = [];

                // Kosár feldolgozása
                foreach ($this->cartItems as $item) {
                    if ($item->type === 'snack') {
                        if (!isset($snackQuantities[$item->snack_id])) {
                            $snackQuantities[$item->snack_id] = 0;
                        }
                        $snackQuantities[$item->snack_id] += 1;
                    } elseif ($item->type === 'movie') {
                        if (!isset($movieQuantities[$item->movie_id])) {
                            $movieQuantities[$item->movie_id] = 0;
                        }
                        $movieQuantities[$item->movie_id] += 1;
                    }
                }

                // Készletellenőrzés és csökkentés (snack + film)
                foreach ($snackQuantities as $snackId => $cartQuantity) {
                    Snack::where('id', $snackId)->decrement(
                        'darabszam',
                        $cartQuantity
                    );
                }

                foreach ($movieQuantities as $movieId => $cartQuantity) {
                    /** @var Movies $movie */
                    $movie = Movies::find($movieId);

                    foreach ($this->cartItems as $item) {
                        if (
                            $item->type === 'movie' &&
                            $item->movie_id === $movieId
                        ) {
                            // Szék foglalásának kezelése
                            $seatRow = $item->seat_row;
                            $seatColumn = $item->seat_column;

                            // Ellenőrizzük, hogy a szék adatok érvényesek-e
                            if (
                                $seatRow !== null &&
                                $seatColumn !== null &&
                                is_numeric($seatRow) &&
                                is_numeric($seatColumn)
                            ) {
                                // Szék állapotának frissítése az adatbázisban
                                $seats = $movie->seats;
                                $seats[$seatRow][$seatColumn] = 'foglalt';
                                $movie->seats = $seats;
                                $movie->save();
                            }
                        }
                    }
                    Movies::where('id', $movieId)->decrement(
                        'darabszam',
                        $cartQuantity
                    );
                }

                // Összes jegy számlálása és mentése
                $totalTickets = array_sum($movieQuantities);

                $user = User::find(Auth::id());
                if ($user) {
                    $user->increment('tickets_purchased', $totalTickets);
                    $user->total_spent += $this->totalPrice;
                    $user->save();
                }

                // Logolás
                foreach ($this->cartItems as $item) {
                    if ($item->type === 'movie') {
                        $movie = Movies::find($item->movie_id);
                        if ($movie) {
                            Log::create([
                                'user_id' => Auth::id(),
                                'action' => 'Vásárlás',
                                'details' =>
                                    'A(z) ' .
                                    $movie->filmnev .
                                    ' filmre sikeresen megvásároltad a jegyet!',
                            ]);
                        }
                    } elseif ($item->type === 'snack') {
                        $snack = Snack::find($item->snack_id);
                        if ($snack) {
                            Log::create([
                                'user_id' => Auth::id(),
                                'action' => 'Vásárlás',
                                'details' =>
                                    'Sikeresen megvásároltad a(z) ' .
                                    $snack->nev .
                                    ' tételt!',
                            ]);
                        }
                    }
                }

                Mail::to(Auth::user()->email)->send(
                    new CartEmail($this->cartItems, $this->totalPrice)
                );
                Cart::where('user_id', $this->user->id)->delete();
                $this->dispatch(
                    'success',
                    message:
                        'Sikeres vásárlás! Összeg: <b>' .
                        number_format($this->totalPrice, 0, ',', '.') .
                        ' Ft</b>'
                );
                $this->loadCart();
                $this->dispatch('redirectToKosar');
            } else {
                $this->dispatch(
                    'error',
                    message: 'A fizetés megszakadt vagy sikertelen volt.'
                );
                $this->dispatch('redirectToKosar');
            }
        }
    }

    public function setCategory($id)
    {
        $this->selectedCategory = $id;
        $this->snacks = Snack::where('category_id', $id)->get();
    }

    public function addToCart($snackId)
    {
        try {
            $snack = Snack::where('id', $snackId)->firstOrFail();

            Cart::addToCart([
                'user_id' => Auth::id(),
                'type' => 'snack',
                'snack_id' => $snack->id,
                'darabszam' => 1,
                'ar' => $snack->ar,
            ]);

            $this->dispatch('ujratoltes');
            $this->loadCart();

            return $this->dispatch(
                'success',
                message:
                    'A(z) <b>' .
                    $snack->nev .
                    '</b> snack sikeresen hozzáadva a kosárhoz!'
            );
        } catch (ValidationException $e) {
            return $this->dispatch(
                'error',
                message: $e->validator->errors()->first()
            );
        } catch (Exception | PDOException $e) {
            return $this->dispatch('error', message: 'Hiba történt!');
        }
    }

    public function loadCart()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->get();
        $this->totalPrice = $this->cartItems->sum(
            fn ($item) => $item->ar * $item->darabszam
        );
        $this->totalCartCount = $this->cartItems->count();
    }

    public function removeFromCart($id)
    {
        Cart::where('id', $id)
            ->where('user_id', $this->user->id)
            ->delete();
        $this->loadCart();
        return $this->dispatch(
            'success',
            message: 'A filmet sikeresen kivetted a kosárból!'
        );
    }

    public function clearUserCart()
    {
        if ($this->cartItems->isEmpty()) {
            return $this->dispatch(
                'error',
                message: 'Nem tudsz kosarat törölni, mert üres!'
            );
        }

        Cart::where('user_id', $this->user->id)->delete();
        $this->loadCart();
        $this->dispatch('ujratoltes');

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Kosár törlés',
            'details' => 'Sikeresen kitörölted a kosárnak a tartalmát.',
        ]);
        return $this->dispatch('success', message: 'A kosár sikeresen kiürítve!');
    }

    public function checkout()
    {
        if ($this->cartItems->isEmpty()) {
            return $this->dispatch(
                'error',
                message: 'A kosár üres, nem lehet fizetni!'
            );
        }

        $totalAmount = 0;

        $errors = [];
        $snackQuantities = [];
        $movieQuantities = [];

        $cartItems = Cart::where('user_id', Auth::id())->get();

        Stripe::setApiKey(
            'sk_test_51R3EGe2MYQhhQhli5e12WyhzXK0tvoAtiXe8G7aqPZCGJZT5iQqgf7QqyXVkI71E9asy6sgqSrSBgz4wGWsVbsxu00LK41b4uj'
        );

        // 1. Ellenőrizd, hogy a kiválasztott székek még szabadok-e
        foreach ($cartItems as $item) {
            if ($item->type === 'movie') {
                $movie = Movies::find($item->movie_id);
                if (!$movie) {
                    $errors[] = "A(z) {$item->movie_id} azonosítójú film nem található!";
                    continue;
                }

                $seatRow = $item->seat_row;
                $seatColumn = $item->seat_column;

                // Ellenőrizd, hogy a szék adatok érvényesek-e
                if (
                    $seatRow === null ||
                    $seatColumn === null ||
                    !is_numeric($seatRow) ||
                    !is_numeric($seatColumn)
                ) {
                    $errors[] =
                        'Érvénytelen székhely adatok a(z) ' .
                        $movie->filmnev .
                        ' filmhez!';
                    continue;
                }

                // Ellenőrizd, hogy a szék létezik-e
                if (
                    !isset($movie->seats[$seatRow][$seatColumn])
                ) {
                    $errors[] =
                        'A(z) ' .
                        $movie->filmnev .
                        ' filmhez a(z) ' .
                        $seatRow .
                        '. sor ' .
                        $seatColumn .
                        '. oszlop nem létezik!';
                    continue;
                }

                // Ellenőrizd, hogy a szék foglalt-e
                if ($movie->seats[$seatRow][$seatColumn] === 'foglalt') {
                    $errors[] ='A(z) <b>' .$movie->filmnev .'</b> filmhez a(z) ' .($seatRow+1) .'. sor ' .($seatColumn+1) .'. oszlop már foglalt!<br>';
                    continue;
                }

                $totalAmount += $movie->jegyar;
            }

            if ($item->type === 'snack') {
                $snack = Snack::find($item->snack_id); // Snack lekérése
                $totalAmount += $snack->ar;
            }
        }

        // 2. Ha van hiba, dobd vissza a hibákat
        if (!empty($errors)) {
            return $this->dispatch('error', message: implode(' ', $errors));
        }

        // 3. Snack és film készlet ellenőrzése (ahogy eddig is tetted)
        foreach ($snackQuantities as $snackId => $cartQuantity) {
            $snack = Snack::find($snackId);
            if (!$snack) {
                $errors[] = "A(z) {$snackId} azonosítójú snack nem található!";
                continue;
            }
            if ($cartQuantity > $snack->darabszam) {
                $errors[] =
                    'Nincs elegendő készlet a(z) <b>' .
                    $snack->nev .
                    '</b> snackből! Elérhető: <b>' .
                    $snack->darabszam .
                    '</b> db, de a kosárban: <b>' .
                    $cartQuantity .
                    '</b> db.';
            }
        }

        foreach ($movieQuantities as $movieId => $cartQuantity) {
            $movie = Movies::find($movieId);
            if (!$movie) {
                $errors[] = "A(z) {$movieId} azonosítójú film nem található!";
                continue;
            }
            if ($cartQuantity > $movie->darabszam) {
                $errors[] =
                    'Nincs elegendő készlet a(z) <b>' .
                    $movie->filmnev .
                    '</b> filmből! Elérhető: <b>' .
                    $movie->darabszam .
                    '</b> db, de a kosárban: <b>' .
                    $cartQuantity .
                    '</b> db.';
            }
        }

        if (!empty($errors)) {
            return $this->dispatch('error', message: implode(' ', $errors));
        }

        $user = User::find(Auth::id());

        if ($user) {
            $user->total_spent += $totalAmount;
            $user->save();
        }

        try {
            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'HUF',
                            'product_data' => [
                                'name' => 'Kosár tartalma',
                            ],
                            'unit_amount' => $totalAmount * 100, // Az összeg forintban
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('mozi.kosar', [
                    'token' => bin2hex(random_bytes(128)), // Random token generálása
                    'stripe_return' => 1,
                    'success' => 1,
                ]),
                'cancel_url' => route('mozi.kosar', [
                    'stripe_return' => 1,
                    'success' => 0,
                ]), // Sikertelen fizetés esetén
            ]);

            return redirect()->to($checkoutSession->url); // Irányítás a Stripe fizetési oldalra
        } catch (Exception $e) {
            return $this->dispatch(
                'error',
                message:
                    'Hiba történt a Stripe session létrehozásakor: ' .
                    $e->getMessage()
            );
        }
        $this->dispatch('ujratoltes');
        $this->loadCart();

        $this->categories = SnackCategories::all(); // Kategóriák frissítése
        $this->snacks = Snack::where('category_id', $this->selectedCategory)->get(); // Snacks frissítése a kiválasztott kategóriában
    }

    public function nemfoglalhato()
    {
        return $this->dispatch(
            'error',
            message: 'Nincs elegendő darabszám ebből tételből.'
        );
    }

    public function render()
    {
        return view('mozi.kosar', [
            'cartItems' => $this->cartItems,
            'totalPrice' => $this->totalPrice,
            'totalCartCount' => $this->totalCartCount,
        ]);
    }
}
