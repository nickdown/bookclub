@extends('layouts.app')

@section('content')  
    <div class="card">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My Profile' : $user->name . "'s Profile" }}</div>

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

    @include('users.partials.stats')

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

    <div class="card my-4">
        <div class="card-header">Discussion</div>

        <div class="card-body">
            @if($user->comments()->count() == 0)
                <p class="text-center">No comments yet.</p>
            @endif
            @foreach($user->comments as $comment)
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>{{ $comment->user->name }} said on <a href="{{ $comment->book->url() }}">{{ $comment->book->title }}</a>:</strong>
                        <br>
                        <div style="white-space: pre-wrap;">{{ $comment->body }}</div>
                    </div>
                    @can('delete', $comment)
                    <div class="d-flex align-items-center pl-4">
                        <form action="/comments/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    @endcan
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection

