@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><a href="/books">All Books</a> > {{ $book->title }}</div>

        <div class="card-body">
            <div class="text-center">
                @include('books.partials.book-image')
                <br>
                <br>
                <strong>Author:</strong> {{ $book->author }}
                <br>
                @include('partials.stars', ['rating' => $book->rating])
            </div>
            <hr>
            @if(! auth()->user()->owns($book))
                @include('partials.add-book-to-library')
                <hr>                
            @else
                <div class="d-flex justify-content-between align-items-center">
                    This book is in your library!
                    <form action="/books/{{ $book->id }}/remove" method="POST">
                        @csrf()
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove From Collection</button>
                    </form>
                </div>
                <hr>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            @include('books.partials.change-status')
                        </div>
                        <div>
                            @include('books.partials.change-rating')
                        </div>
                    </div>
                <hr>
            @endif
            
            <table class="table mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Name:</th>
                        <th>Status:</th>
                        <th>Rating:</th>
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
                <tfoot>
                    <tr>
                        <td colspan="3">Readers: {{ $book->readers()->count() }}</td>
                    </tr>
                </tfoot>
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
                <div class="d-flex justify-content-between">
                    <div>
                        <strong><a href="{{ $comment->user->url() }}">{{ $comment->user->name }}</a> said:</strong>
                        <br>
                        <div style="white-space: pre-wrap;">{{ $comment->body }}</div>
                    </div>
                    @can('delete', $comment)
                        <form action="/comments/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
                <hr>
            @endforeach
            <form action="/comments" method="POST">
                @csrf()
                <input type="hidden" name="book" value="{{ $book->id }}">
                <div class="form-group">
                    <label for="body">Add a Comment:</label>
                    <textarea class="form-control" id="body" name="body" placeholder="Your opinion is valueable!"></textarea>
                </div>
                
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
