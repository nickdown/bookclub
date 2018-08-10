@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Book</div>

        <div class="card-body">
            <form action="/books" method="POST" enctype="multipart/form-data">
                @csrf()
                <div class="form-group">
                    <label for="book-title-input">Title:</label>
                    <input type="text" class="form-control" id="book-title-input" name="title" placeholder="Title" required>
                </div>

                <div class="form-group">
                    <label for="book-author-input">Author:</label>
                    <input type="text" class="form-control" id="book-author-input" name="author" placeholder="Author" required>
                </div>

                <div class="form-group">
                    <label for="book-image-input">Cover:</label>
                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control-file" name="image" id="book-image-input" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
