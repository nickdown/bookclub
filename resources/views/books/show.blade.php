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
                <strong>Average Rating:</strong> {{ ! is_null($book->rating) ? $book->rating . " / 5" : 'not rated'}}
            </div>
            <hr>
            @if(! auth()->user()->owns($book))
                @include('partials.add-book-to-library')
                <hr>                
            @else
                This book is in your library!
                <form action="/books/{{ $book->id }}/remove" method="POST">
                    @csrf()
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove From Collection</button>
                </form>
                <hr>
                    <div class="row">
                        <div class="col col-sm-6">
                            @include('books.partials.change-status')
                        </div>
                        <div class="col col-sm-6">
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
                            <td>{{ ! is_null($reader->pivot->rating) ? $reader->pivot->rating : 'not rated'}}</td>
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
@endsection
