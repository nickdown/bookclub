<div class="card text-center m-2 p-4" style="width: 16rem;">
    @include('books.partials.book-image')
    <div class="card-body">
        <h5 class="card-title"><a href="{{ $book->url() }}">{{ $book->title }}</a></h5>
        <div class="card-text">
            <strong>Author:</strong> {{ $book->author }}
            <br>
            @include('partials.stars', ['rating' => $book->rating])
        </div>
    </div>
</div>