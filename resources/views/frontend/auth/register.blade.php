@extends('frontend.layout.auth_frontend')
@section('content')
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ old('firstname') }}">
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}">
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="UserName" value="{{ old('username') }}">
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <select name="gender" class="form-select">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="1" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="2" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="3" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="input-group-text"><span class="bi bi-gender-ambiguous"></span></div>
                    </div>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="tel" name="phone_no" class="form-control" placeholder="Phone" value="{{ old('phone_no') }}">
                        <div class="input-group-text"><span class="bi bi-phone"></span></div>
                    </div>
                    @error('phone_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">I agree to the <a href="#">terms</a></label>
                            </div> --}}
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <h6 class="d-inline">Already have an account? </h6>
                    <a href="{{ route('login') }}" class="text-center">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection