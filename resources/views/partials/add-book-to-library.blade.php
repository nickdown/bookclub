<form action="/user/books" method="POST">
    @csrf()
    <input type="hidden" name="book" value="{{ $book->id }}">
    <button class="btn btn-primary" type="submit">Add to Library.</button>
</form>