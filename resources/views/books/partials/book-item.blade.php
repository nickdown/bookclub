<div class="card text-center m-2" style="width: 16rem;">
    <div class="px-4 pt-4">
        @include('books.partials.book-image')
    </div>
    <div class="card-body d-flex flex-column justify-content-between" style="min-height: 15rem;">
        <a href="{{ $book->url() }}">{{ $book->title }}</a>
        <span><strong>Author:</strong> {{ $book->author }}</span>
        @include('partials.stars', ['rating' => $book->rating])
        <div>
            @if(auth()->user()->owns($book))
                In Your Library <i class="fas fa-check"></i>
            @else
                @include('partials.add-book-to-library')
            @endif
        </div>
    </div>
</div>