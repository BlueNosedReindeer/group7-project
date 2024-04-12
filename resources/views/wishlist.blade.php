<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body>
    <header>
        <a href="/books">Back to store</a>
    </header>
    <h1>Books</h1>
    <ul>
        @foreach ($wishBook as $book)
            <li>{{ $book->title }} by {{ $book->author }} - ${{ $book->price }}</li>
            <form action="/cart" method="post">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <button type="submit">Add to Cart</button>
            </form>

            <form action="/wishlist" method="delete">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <button type="submit">Remove from Wishlist</button>
            </form>
        @endforeach
    </ul>
</body>
</html>