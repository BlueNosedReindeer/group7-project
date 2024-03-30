<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<header>
        <a href="/books">Back to store</a>
    </header>
    @foreach ($cartItems as $cartItem)
        <p>{{ $cartItem->title }} by {{ $cartItem->author }} - ${{ $cartItem->price }}</p>
        <form action="/cart" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{ $cartItem->id }}">
            <button type="submit">Remove from Cart</button>
        </form>
    @endforeach

    <p>Subtotal: ${{ $subtotal }}</p>

</body>
</html>