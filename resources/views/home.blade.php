@extends('layouts.app')

@section('content')    
    <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container">
                @foreach($books as $book)
                    <div class="row pb-4">
                        <div class="col col-lg-4">
                            @include('partials.book-image')
                        </div>
                        <div class="col col-lg-6">
                            <a href="{{ $book->url() }}">{{ $book->title }}</a>
                            <br>
                            <strong>Author:</strong> {{ $book->author }}
                            <br>
                            <strong>Status:</strong> {{ $book->pivot->status }}
                            <br>
                            <strong>My Rating:</strong> {{ ! is_null($book->pivot->rating) ? $book->pivot->rating : 'not rated'}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
