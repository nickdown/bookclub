@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><a href="/books">All Books</a> > {{ $book->title }}</div>

        <div class="card-body">
            <div class="d-flex flex-column align-items-center">
                <span style="max-width: 15rem;">
                    @include('books.partials.book-image', ['image' => $book->image])
                </span>
                <span><strong>Author:</strong> {{ $book->author }}</span>
                @include('partials.stars', ['rating' => $book->rating])
            </div>
            <hr>
            @if(! auth()->user()->owns($book))
                <div class="d-flex justify-content-center">
                    @include('partials.add-book-to-library')
                </div>
                <hr>                
            @else
                <div class="d-flex justify-content-between align-items-center">
                    <span>In Library <i class="fas fa-check"></i></span>
                    <form action="/books/{{ $book->id }}/remove" method="POST">
                        @csrf()
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </form>
                </div>
                <hr>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            @include('books.partials.book-user-update')
                        </div>
                    </div>
                <hr>
            @endif
            <h3 style="m-0 p-0">Readers:</h3>
            <table class="table table-borderless" style="padding: -20px">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 33.33%">Name:</th>
                        <th style="width: 30%">Status:</th>
                        <th style="width: 36.67%">Rating:</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($book->readers as $reader)
                        <tr>
                            <td>{{ $reader->name }}</td>
                            <td>{{ $reader->pivot->status }}</td>
                            <td>@include('partials.stars', ['rating' => $reader->pivot->rating])</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">Discussion</div>

        <div class="card-body">
            @if($book->comments()->count() == 0)
                <p class="text-center">No comments yet.</p>
                <hr>
            @endif
            @foreach($book->comments as $comment)
                @include('comments.row')
                <hr>
            @endforeach
            <form action="/comments" method="POST">
                @csrf()
                <input type="hidden" name="book" value="{{ $book->id }}">
                <div class="form-group">
                    <label for="body">Add a Comment:</label>
                    <textarea class="form-control" id="body" name="body" placeholder="Your opinion is valuable!"></textarea>
                </div>
                
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
