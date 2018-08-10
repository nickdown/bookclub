@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Profiles</div>

        <div class="card-body p-0">
            <table class="table mt-4" >
                <thead class="thead-light">
                    <tr>
                        <th>Name:</th>
                        <th>Books:</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ $user->url() }}">{{ $user->name }}</a></td>
                            <td>{{ $user->books()->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
