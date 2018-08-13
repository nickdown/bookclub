<div class="p-4">
    @include('partials.book-image')
</div>
<div style="display: flex; justify-content: center; align-items: center;">
    <div>
        <a href="{{ $book->url() }}">{{ $book->title }}</a>
        <br>
        <strong>Author:</strong> {{ $book->author }}
        <br>
        <strong>Status:</strong> {{ $book->pivot->status }}
        <br>
        <strong>My Rating:</strong> {{ ! is_null($book->pivot->rating) ? $book->pivot->rating : 'not rated'}}

        <form action="/books/{{ $book->id }}/remove" method="POST">
            @csrf()
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove From Collection</button>
        </form>
    </div>
</div>