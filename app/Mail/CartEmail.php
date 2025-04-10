<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CartEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $cartItems;
    public $totalPrice;

    public function __construct($cartItems, $totalPrice)
    {
        $this->cartItems = $cartItems;
        $this->totalPrice = $totalPrice;
    }

    public function build()
    {
        return $this->subject('Kosár tartalma')
                    ->view('emails.kosar')
                    ->with([
                        'cartItems' => $this->cartItems,
                        'totalPrice' => $this->totalPrice
                    ]);
    }
}
