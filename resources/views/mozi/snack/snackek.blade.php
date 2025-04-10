<div class="snackek">
    @foreach($snacks as $snack)
        <div class="snack">
            <img src="{{ $snack->snackkep }}" alt="{{ $snack->snacknev }}" class="snack-image">
            <h3>{{ $snack->snacknev }}</h3>
            <p>{{ $snack->snackkategoria }}</p>
            <p>{{ $snack->snackar }} Ft</p>
            <button wire:click="addToCart({{ $snack->id }})">Hozzáadás a kosárhoz</button>
        </div>
    @endforeach
</div>

{{ $snacks->links() }}