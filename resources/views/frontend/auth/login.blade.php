@extends('frontend.layout.auth_frontend')
@section('content')

    <body class="login-page bg-body-secondary">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3"> <input type="email" class="form-control" name="email"
                                placeholder="Email">
                            <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3"> <input type="password" class="form-control" name="password"
                                placeholder="Password">
                            <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                        </div> <!--begin::Row-->
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label> </div>
                            </div> <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div> <!-- /.col -->
                        </div> <!--end::Row-->
                        <p class="mb">
                            <a href="{{ route('user.mail.page') }}" class="text-center"> I forgot my password Forget</a>
                        </p>
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center"> Don't have an account Register</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    @endsection
