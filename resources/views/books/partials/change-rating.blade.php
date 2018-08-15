<form class="form-inline" action="/user/books/{{ $book->id }}" method="POST">
    @csrf
    @method('PATCH')
    <select class="form-control mr-sm-3" name="rating" id="rating">
        <option {{ is_null(auth()->user()->bookRating($book)) ? 'selected' : '' }} disabled hidden>Choose Rating</option>
        <option value="1" {{ auth()->user()->bookRating($book) == '1' ? 'selected' : '' }}>1 / 5</option>
        <option value="2" {{ auth()->user()->bookRating($book) == '2' ? 'selected' : '' }}>2 / 5</option>
        <option value="3" {{ auth()->user()->bookRating($book) == '3' ? 'selected' : '' }}>3 / 5</option>
        <option value="4" {{ auth()->user()->bookRating($book) == '4' ? 'selected' : '' }}>4 / 5</option>
        <option value="5" {{ auth()->user()->bookRating($book) == '5' ? 'selected' : '' }}>5 / 5</option>
    </select>
    <button type="submit" class="btn btn-primary">Update Rating</button>
</form>