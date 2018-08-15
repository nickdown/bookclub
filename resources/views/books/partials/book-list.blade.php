<div class="d-flex flex-wrap justify-content-around">
    @if($books->count() == 0)
        No books available.
    @endif
    @foreach($books as $book)
            @include('books.partials.book-item')
    @endforeach
</div>