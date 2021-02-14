@extends('layouts.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
    </div>

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.success_msg')
    </div>

    <div class="col-12 col-10-6 ml-2">

        <form
            enctype="multipart/form-data"
            action="{{ ! is_null($settings) ? route('settings.update', $settings->id ) : route('settings.store') }}"
            method="post">
            <div class="form-group">
                @csrf
                @if (! is_null($settings))
                    @method('put')
                @endif
            </div>
            <div class="row">

                <div class="col-lg-7">

                    <div class="form-group">
                        <label for="site_name">Site Name <sup class="text-danger">*</sup></label>
                        <input
                            type="text"
                            name="site_name"
                            class="form-control form-control-lg @error('site_name') is-invalid @enderror"
                            value="{{ is_null($settings) ? old('site_name') : $settings->site_name }}"
                            id="site_name"
                            placeholder="e.g Theratio">
                            @error('site_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="site_name">Site Email <sup class="text-danger">*</sup></label>
                        <input
                            type="email"
                            name="site_email"
                            class="form-control form-control-lg @error('site_email') is-invalid @enderror"
                            value="{{ is_null($settings) ? old('site_email') : $settings->site_email }}"
                            id="site_email"
                            placeholder="e.g sitename@gmail.com">
                            @error('site_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="site_name">Location <sup class="text-danger">*</sup></label>
                        <input
                            type="text"
                            name="site_location"
                            class="form-control form-control-lg @error('site_location') is-invalid @enderror"
                            value="{{ is_null($settings) ? old('site_location') : $settings->site_location }}"
                            id="site_location"
                            placeholder="e.g 411 University St, Seattle, USA">
                            @error('site_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="site_name">Phone <sup class="text-danger">*</sup></label>
                        <input
                            type="text"
                            name="site_phone"
                            class="form-control form-control-lg @error('site_phone') is-invalid @enderror"
                            value="{{ is_null($settings) ? old('site_phone') : $settings->site_phone }}"
                            id="site_phone"
                            placeholder="e.g 01018034310">
                            @error('site_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                </div>
                <div class="col-lg-5">

                    {{-- Light Logo --}}
                    @if ( !isset( $settings->site_logo_light ) )
                    <div class="form-group">
                        <label for="site_logo_light">Site Logo Light  <sup class="text-danger">*</sup></label>
                        <input
                            type="file"
                            name="site_logo_light"
                            class="form-control form-control-lg @error('site_logo_light') is-invalid @enderror"
                            id="site_logo_light">
                            @error('site_logo_light')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-body">
                                <img
                                src="{{ asset(isset($settings->site_logo_light) ? 'storage/' .  $settings->site_logo_light : '') }}"
                                alt="{{ isset($settings->site_name) ? $settings->site_name : '' }}"
                                />
                            </div>

                                <div class="form-group">
                                    <label class="btn btn-light mt-1" for="site_logo_light">Choose an other Light Logo</label>
                                    <input
                                        type="file"
                                        name="site_logo_light"
                                        class="d-none form-control @error('site_logo_light') is-invalid @enderror"
                                        id="site_logo_light">
                                        @error('site_logo_light')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                        </div>
                    </div>
                    @endif

                    {{-- Dark Logo --}}

                    @if ( !isset( $settings->site_logo_dark ) )
                    <div class="form-group">
                        <label for="site_logo_dark">Site Logo Light  <sup class="text-danger">*</sup></label>
                        <input
                            type="file"
                            name="site_logo_dark"
                            class="form-control form-control-lg @error('site_logo_dark') is-invalid @enderror"
                            id="site_logo_dark">
                            @error('site_logo_dark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-body bg-dark">
                                <img
                                src="{{ asset(isset($settings->site_logo_dark) ? 'storage/' .  $settings->site_logo_dark : '') }}"
                                alt="{{ isset($settings->site_name) ? $settings->site_name : '' }}"
                                />
                            </div>

                                <div class="form-group">
                                    <label class="btn btn-light mt-1" for="site_logo_dark">Choose an other Dark Logo</label>
                                    <input
                                        type="file"
                                        name="site_logo_dark"
                                        class="d-none form-control @error('site_logo_dark') is-invalid @enderror"
                                        id="site_logo_light">
                                        @error('site_logo_dark')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            <button class="btn btn-primary" type="submit">{{  is_null($settings) ? 'Publish' : 'Update' }}</button>

        </form>

    </div>
</div>

@endsection
