<div class="d-flex flex-fill flex-column p-4">
    @include('books.partials.book-image')
    <div class="d-flex justify-content-center py-4">
        <div class="d-flex flex-column text-center">
            <a href="{{ $book->url() }}">{{ $book->title }}</a>
            <span><strong>Author:</strong> {{ $book->author }}</span>
            <span><strong>Average Rating:</strong> {{ $book->rating ?? 'no reviews' }}</span>
        </div>
    </div>
</div>