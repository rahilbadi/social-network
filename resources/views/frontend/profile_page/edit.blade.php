@extends('frontend.layout.app')
@section('content')
    <div class="container">
        <h2>Edit Profile for {{ $user->firstname }} {{ $user->lastname }}</h2>

        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                <img src="{{ $user->image_url }}" class="rounded-circle" alt="Profile Picture" width="150"
                    height="150">

                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="remove_profile_picture"
                        name="remove_profile_picture" value="1">
                    <label class="form-check-label" for="remove_profile_picture">Remove profile picture</label>
                </div>

                @error('profile_picture')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
                @error('firstname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
                @error('firstname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="profile_visibility">Profile Visibility</label>
                <select class="form-control" id="profile_visibility" name="profile_visibility">
                    <option value="0" {{ $user->profile_visibility == 0 ? 'selected' : '' }}>Private</option>
                    <option value="1" {{ $user->profile_visibility == 1 ? 'selected' : '' }}>Public</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3 mx-1">Update Profile</button>
            <a href="{{ route('profile.index') }}" class="btn btn-primary mt-3 mx-1">Back</a>

        </form>
    </div>
@endsection
