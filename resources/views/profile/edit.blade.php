@extends('layouts.app')

@section('content')    
    <div class="card">
        <div class="card-header">Edit {{ $user->name }}</div>

        <div class="card-body">
            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf()
                @method('PATCH')
                <div class="form-group">
                    <label for="user-name-input">Name:</label>
                    <input type="text" class="form-control" id="user-name-input" name="name" placeholder="{{ $user->name }}">
                    <subtext>Optional</subtext>
                </div>

                <div class="form-group">
                    <label for="avatar-input">Avatar:</label>
                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control-file" name="avatar" id="avatar-input">
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
@endsection


