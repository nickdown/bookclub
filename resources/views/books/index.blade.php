@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Books</div>

        <div class="card-body p-0">
            <table class="table mt-4" >
                <thead class="thead-light">
                    <tr>
                        <th>Title:</th>
                        <th>Author:</th>
                        <th>Readers:</th>
                        <th>Average Rating:</th>
                        <th></th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><a href="{{ $book->url() }}">{{ $book->title }}</a></td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->readers()->count() }}</td>
                            <td>{{ !(is_null($book->rating)) ? $book->rating : 'not rated' }}</td>
                            <td>
                            @if(auth()->user()->owns($book))
                                <span class="badge badge-secondary">In Libarary</span>
                            @else
                                @include('partials.add-book-to-library')
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
