@extends('layouts.app')

@section('content')    
    <div class="card">
        <div class="card-header"><a href="/users">All Users</a> > {{ $user->name }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{ $user->name }} is reading:
            <table class="table mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Title:</th>
                        <th>Author:</th>
                        <th>Status:</th>
                        <th>My Rating:</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($user->books as $book)
                        <tr>
                            <td><a href="{{ $book->url() }}">{{ $book->title }}</a></td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->pivot->status }}</td>
                            <td>{{ ! is_null($book->pivot->rating) ? $book->pivot->rating : 'not rated'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

