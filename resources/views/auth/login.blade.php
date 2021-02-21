@extends('layouts.auth')

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body p-0">
                    <div class="p-5">
                        <h4 class="h3 mb-3">Login!</h4>
                        {{-- route('api.login') --}}
                        <form action="{{ route('login') }}" method="POST" class="authentication-form">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Name<sup class="text-danger">*</sup></label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="uil uil-user"></i>
                                        </span>
                                    </div>
                                    <input
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="ahmed mostafa">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Email Address <sup class="text-danger">*</sup></label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="mail"></i>
                                        </span>
                                    </div>
                                    <input
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="ahmed@ahmedmostafa.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label class="form-control-label">Password <sup class="text-danger">*</sup></label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">
                                    <span>Forgot Your Password?</span>
                                </a>
                                @endif
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="lock"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password"
                                        name="password"
                                        placeholder="Enter your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="checkbox-signin"
                                        name="remember"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label
                                        class="custom-control-label"
                                        for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In
                                </button>
                            </div>
                        </form>
                        <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Or</span></div>
                        <div class="row">
                            <div class="col-6">
                                <a href="" class="btn btn-white"><i class='uil uil-google icon-google mr-2'></i>With Google</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="" class="btn btn-white"><i class='uil uil-facebook mr-2 icon-fb'></i>With Facebook</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Don't have an account?
                        <a
                            href="{{ route('register') }}"
                            class="text-primary font-weight-bold ml-1">
                            <span>Sign Up</span>
                        </a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
</div>
@endsection
