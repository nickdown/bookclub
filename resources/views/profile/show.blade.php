@extends('layouts.app')

@section('content')  
    <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">
            <div class="d-flex">
                <img class="m-2" src="{{ $user->avatar }}" alt="{{ $user->name }}" style="border-radius: 50%;" width="75px" height="75px"></img>
                <div class="m-2">
                    <h1>{{ $user->name }}</h1>
                    <h4>{{ $user->email }}</h4>
                </div>
            </div>
        </div>
    </div>

    @include('profile.stats')

    <div class="card my-4">
        <div class="card-header">{{ $user->name }}'s Current Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', ['books' => $user->books()->current()->get()])
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ $user->name }}'s Completed Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', ['books' => $user->books()->completed()->get()])
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ $user->name }}'s Queued Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', ['books' => $user->books()->queued()->get()])
        </div>
    </div>
@endsection
