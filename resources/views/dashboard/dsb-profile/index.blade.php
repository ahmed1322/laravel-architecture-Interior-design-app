@extends('layouts.dashboard')
@section('dashboard')

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
    </div>

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.success_msg')
    </div>

    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title mt-0 mb-3">Profile</h3>

                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        <div class="form-group">
                            @csrf
                            @method('put')
                        </div>
                        <div class="form-group">
                            <label for="name">Name<sup class="text-danger"></sup></label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                placeholder="e.g ..."
                                value="{{ $user->name }}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($user)
                                <input name="old_name" type="hidden" value="{{ $user->name }}">
                            @endisset
                        </div>

                        <div class="form-group">
                            <label for="name">Email<sup class="text-danger"></sup></label>
                            <input
                                type="text"
                                id="Email"
                                name="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                placeholder="e.g ..."
                                value="{{ $user->email }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($user)
                                <input name="old_email" type="hidden" value="{{ $user->email }}">
                            @endisset
                        </div>

                        <div class="form-group">
                            <label for="content">About<sup class="text-danger"></sup></label>
                            <textarea
                                name="about"
                                id="about"
                                class="form-control form-control-lg @error('about') is-invalid @enderror"
                                cols="5"
                                rows="5">{{ ! empty($user->about) ? $user->about : old('about') }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>
            </div>
        </div>

    </div>
    
@endsection