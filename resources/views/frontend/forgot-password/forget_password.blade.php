@extends('frontend.layout.auth_frontend')
@section('content')
    <div class="login-box">
        <div class="login-logo">
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step away from your new password, recover your password now.</p>
                <form action="{{ route('change.password') }}" method="post" id="forgot-password-form">
                    @csrf
                    <input type="hidden" name="user_token" value="{{ $verifyUser->token }}">
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-lock-fill"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-lock-fill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection
