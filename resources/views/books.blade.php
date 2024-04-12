<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <header>
        <a href="/cart">Cart</a>
    </header>
    <h1>Books</h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }} by {{ $book->author }} - ${{ $book->price }}</li>
            <form action="/cart" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $book->id }}">
                <button type="submit">Add to Cart</button>
            </form>

            <form action="/wishlist" method="post">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <button type="submit">Add to Wishlist</button>
            </form>
        @endforeach
    </ul>
</body>
</html>