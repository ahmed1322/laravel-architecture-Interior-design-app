@extends('layouts.dashboard')
@php
    print_r($errors)
@endphp
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-10 mx-auto">
        <form
            method="POST"
            action="{{ isset( $testimonial ) ? route('testimonial.update', $testimonial->id) : route('testimonial.store') }}"
            class="form-horizontal mb-5">
            @csrf
            @isset($testimonial)
                @method('put')
                <input type="hidden" name="id" value="{{ $testimonial->id }}">
            @endisset

            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-body">

                        {{-- Testimonial Name --}}
                        <div class="form-group">
                            <label for="name">Testimonial Name</label>
                            <input
                                value="{{ isset( $testimonial ) ? ( old('name') ? old('name') : $testimonial->name ) : old('name') }}"
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                placeholder="e.g admin" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($testimonial)
                                <input type="hidden" name="old_name" value="{{ $testimonial->name }}">
                            @endisset
                        </div>

                        {{-- Client Details --}}
                        <div class="form-group">
                            <label for="details">Client Details</label>
                            <textarea
                                id="details"
                                name="details"
                                class="form-control form-control-lg @error('details') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="3">{{ isset( $testimonial ) && old('details') === null ? $testimonial->details : old('details') }}</textarea>
                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($testimonial)
                                <input type="hidden" name="old_details" value="{{ $testimonial->details }}">
                            @endisset
                        </div>

                        {{-- Testimonial Content --}}
                        <div class="form-group">
                            <label for="content">Testimonial Content</label>
                            <textarea
                                id="content"
                                name="content"
                                class="form-control form-control-lg @error('content') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="6"
                                cols="10">{{ isset( $testimonial ) && old('content') === null ? $testimonial->content : old('content') }}</textarea>
                                {{-- @if ( old('description') !== null )
                                    {{  old('description') }}
                                @elseif( isset( $slider )  )
                                    {{ $slider->description }}
                                @endif --}}
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($testimonial)
                                <input type="hidden" name="old_content" value="{{ $testimonial->content }}">
                            @endisset
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-{{ isset( $testimonial ) ? 'success' : 'primary' }} float-right mt-3">
                                {{ isset( $testimonial ) ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>

</div>

@endsection
