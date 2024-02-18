<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    @foreach ($books as $book)
        <p>{{ $book->title }} - ${{ $book->price }}</p>
        <form action="{{ route('cart.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Remove</button>
        </form>
    @endforeach
    <p>Subtotal: ${{ $subtotal }}</p>
</body>
</html>