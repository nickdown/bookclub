<form class="form-inline" action="/user/books/{{ $book->id }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group mr-3">
        <label class="my-1 mr-2" for="status">My Status:</label>
        <select class="form-control" name="status">
            <option value="0" {{ auth()->user()->bookStatus($book) == 'queued' ? 'selected' : '' }}>Queued</option>
            <option value="1" {{ auth()->user()->bookStatus($book) == 'current' ? 'selected' : '' }}>Current</option>
            <option value="2" {{ auth()->user()->bookStatus($book) == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div class="form-group mr-3">
        <label class="my-1 mr-2" for="rating">My Rating:</label>
        <select class="form-control" name="rating" id="rating">
            <option {{ is_null(auth()->user()->bookRating($book)) ? 'selected' : '' }} disabled hidden>Choose Rating</option>
            <option value="1" {{ auth()->user()->bookRating($book) == '1' ? 'selected' : '' }}>1 / 5</option>
            <option value="2" {{ auth()->user()->bookRating($book) == '2' ? 'selected' : '' }}>2 / 5</option>
            <option value="3" {{ auth()->user()->bookRating($book) == '3' ? 'selected' : '' }}>3 / 5</option>
            <option value="4" {{ auth()->user()->bookRating($book) == '4' ? 'selected' : '' }}>4 / 5</option>
            <option value="5" {{ auth()->user()->bookRating($book) == '5' ? 'selected' : '' }}>5 / 5</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mt-sm-0">Save</button>
</form>