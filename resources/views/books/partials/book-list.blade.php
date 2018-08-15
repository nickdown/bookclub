<div class="d-flex flex-wrap justify-content-around">
    @foreach($books as $book)
            @include('books.partials.book-item')
    @endforeach
</div>