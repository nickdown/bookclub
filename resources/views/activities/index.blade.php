@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Books</div>

        <div class="card-body">
            @include('books.partials.book-list')
        </div>
    </div>
@endsection