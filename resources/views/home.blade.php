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
                <h1>Profile Image</h1>
                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" style="border-radius: 50%;" width="75px"></img>
                
            </div>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">My Book Shelf</div>

        <div class="card-body">
            <div class="container">
                @foreach($books as $book)
                    <div class="row pb-4">
                        @include('partials.book-item')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
