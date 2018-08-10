<form class="form-inline" action="/user/books/{{ $book->id }}" method="POST">
    @csrf
    @method('PATCH')
    <select class="form-control mr-sm-3" name="status">
        <option value="0" {{ auth()->user()->bookStatus($book) == 'unstarted' ? 'selected' : '' }}>Unstarted</option>
        <option value="1" {{ auth()->user()->bookStatus($book) == 'started' ? 'selected' : '' }}>Started</option>
        <option value="2" {{ auth()->user()->bookStatus($book) == 'finished' ? 'selected' : '' }}>Finished</option>
    </select>
    <button type="submit" class="btn btn-primary">Update Status</button>
</form>