@extends('layouts.dashboard')
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-10 mx-auto">
        <form
            enctype="multipart/form-data"
            method="POST"
            action="{{ isset( $slider ) ? route('slider.update', $slider->id) : route('slider.store') }}"
            class="form-horizontal mb-5">
            @csrf
            @isset($slider)
                @method('put')
                <input type="hidden" name="id" value="{{ $slider->id }}">
            @endisset

            <div class="row">
                <div class="col-lg-7">
                    {{-- Sldier Title && Description --}}
                    <div class="card card-body">
                        {{-- Sldier Title --}}
                        <div class="form-group">
                            <label for="title">Slider Title</label>
                            <input
                                value="{{ isset( $slider ) ? ( old('title') ? old('title') : $slider->title ) : old('title') }}"
                                type="text"
                                id="title"
                                name="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                placeholder="e.g admin" />
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($slider)
                                <input type="hidden" name="old_title" value="{{ $slider->title }}">
                            @endisset
                        </div>

                        {{-- Sldier Description --}}
                        <div class="form-group">
                            <label for="description">Slider Description</label>
                            <textarea
                                data-desc="{{ empty( old('description') ) ? 'empty' : old('description') }}"
                                id="description"
                                name="description"
                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="6"
                                cols="10">{{ isset( $slider ) && old('description') === null ? $slider->description : old('description') }}</textarea>
                                {{-- @if ( old('description') !== null )
                                    {{  old('description') }}
                                @elseif( isset( $slider )  )
                                    {{ $slider->description }}
                                @endif --}}
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($slider)
                                <input type="hidden" name="old_description" value="{{ $slider->description }}">
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    {{-- Slider Portfolio --}}

                    <div class="card card-body">
                        {{-- Include Portfolio Dropdown --}}
                        @include( 'partials.Composers.Portfolios.dropdown', [
                            'label_key_name' => 'Slider',
                        ])
                    </div>

                    {{-- Sldier Category && Visiblitiy --}}
                    <div class="card card-body">

                        {{-- Include Category Dropdown --}}
                        @include( 'partials.Composers.Categories.dropdown', [
                            'label_key_name' => 'Slider',
                        ])

                        {{-- Sldier Visiblitiy --}}
                        <div class="form-check form-group">
                            <input
                                @if ( isset( $slider ) && $slider->visible == 1 && old('visible') === null )
                                    {{ 'checked' }}
                                @elseif( old('visible') == 1)
                                    {{ 'checked' }}
                                @else
                                    {{ '' }}
                                @endif
                                class="form-check-input @error('visible') is-invalid @enderror"
                                name="visible"
                                value="1"
                                type="checkbox"
                                id="visible">
                            <label
                                class="form-check-label @error('visible') is-invalid @enderror"
                                for="visible">Slider Visiblitiy</label>
                            @error('visible')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card card-body">
                        @if (! isset($slider) )
                            {{-- Sldier Image --}}
                            <div class="form-group">
                                <label for="image">Slider Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @isset($slider)
                                    <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                @endisset
                            </div>

                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <img height="400" class="img-fluid" src="{{ asset( 'storage/' . $slider->image ) }}" alt="{{ $slider->title }}">
                                </div>
                                <div class="form-group">

                                    <label class="btn btn-light mt-3" for="image">Choose an other Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="d-none form-control @error('image') is-invalid @enderror"
                                        id="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-{{ isset( $slider ) ? 'success' : 'primary' }} float-right mt-5">
                                {{ isset( $slider ) ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </form>
    </div>

</div>

@endsection
