<div class="d-flex flex-wrap">
    @foreach($books as $book)
            @include('books.partials.book-item')
    @endforeach
</div>