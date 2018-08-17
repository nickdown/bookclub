@extends('layouts.app')

@section('content')  
    <div class="card">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My Profile' : $user->name . "'s Profile" }}</div>

        <div class="card-body">
            <div class="d-flex justify-content-around">
                <div class="d-flex flex-column align-items-center">
                    @include('users.partials.avatar', ['user' => $user])
                    <h1>{{ $user->name }}</h1>
                </div>
            </div>
            <div class="d-flex flex-md-row flex-column align-items-center justify-content-around mt-3">
                <span><strong>Total Books:</strong> {{ $user->books()->count() }}</span>
                <span><strong>Current Books:</strong> {{ $user->books()->current()->count() }}</span>
                <span><strong>Queued Books:</strong> {{ $user->books()->queued()->count() }}</span>
                <span><strong>Completed Books:</strong> {{ $user->books()->completed()->count() }}</span>
            </div>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My' : $user->name . "'s" }} Current Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', [
                'books' => $user->books()->current()->get(),
                'hide_links' => auth()->id() == $user->id
            ])
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My' : $user->name . "'s" }} Queued Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', [
                'books' => $user->books()->queued()->get(),
                'hide_links' => auth()->id() == $user->id
            ])
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My' : $user->name . "'s" }} Completed Books:</div>

        <div class="card-body">
            @include('books.partials.book-list', [
                'books' => $user->books()->completed()->get(),
                'hide_links' => auth()->id() == $user->id
            ])
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">{{ auth()->id() == $user->id ? 'My' : $user->name . "'s" }} Discussion</div>

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

