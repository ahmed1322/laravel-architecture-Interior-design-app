@extends('layouts.auth')

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body p-0">
                    <div class="p-5">
                        <h4 class="h3 mb-3">Register!</h4>
                        <form action="{{ route('register') }}" method="POST" class="authentication-form">
                            @csrf

                            <div class="form-group">
                                <label class="form-control-label">Name <sup class="text-danger">*</sup></label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="user"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="Your full name"
                                         name="name" value="{{ old('name') }}">
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

                            <div class="form-group ">
                                <label class="form-control-label">Password <sup class="text-danger">*</sup></label>
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

                            <div class="form-group ">
                                <label class="form-control-label">Confirm Password <sup class="text-danger">*</sup></label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="lock"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password-confirm"
                                        name="password_confirmation"
                                        placeholder="Confirm your password">
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                            </div>
                        </form>
                        
                    </div>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Already have account? 
                        <a href="{{ route('login') }}" class="text-primary font-weight-bold ml-1">Login</a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
</div>
@endsection
