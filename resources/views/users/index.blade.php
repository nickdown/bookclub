@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Profiles</div>

        <div class="card-body p-0">
            <div class="d-flex flex-wrap justify-content-around">
                @foreach($users as $user)
                    <div class="card text-center m-2" style="width: 16rem;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="pb-3">
                                <a href="{{ $user->url() }}">
                                    @include('users.partials.avatar', ['user' => $user])
                                </a>
                            </div>
                            <h4><a href="{{ $user->url() }}">{{ $user->name }}</a></h4>
                            {{ $user->books()->count() }} Books
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
