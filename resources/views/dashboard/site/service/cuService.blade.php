@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection
@php
    // print_r($errors)
@endphp
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-10 mx-auto">
        <form
            enctype="multipart/form-data"
            method="POST"
            action="{{ isset( $service ) ? route('service.update', $service->id) : route('service.store') }}"
            class="form-horizontal mb-5">
            @csrf
            @isset($service)
                @method('put')
                <input type="hidden" name="id" value="{{ $service->id }}">
            @endisset

            <div class="row">
                <div class="col-lg-7">
                    {{-- Service Title && Description --}}
                    <div class="card card-body">
                        {{-- Service Title --}}
                        <div class="form-group">
                            <label for="title">Service Title</label>
                            <input
                                value="{{ isset( $service ) ? ( old('title') ? old('title') : $service->title ) : old('title') }}"
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
                        </div>

                        {{-- Service Description --}}
                        <div class="form-group">
                            <label for="description">Service Description</label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="6"
                                cols="10">{{ isset( $service ) && old('description') === null ? $service->description : old('description') }}</textarea>
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
                        </div>

                        {{-- Service Excerpt --}}
                        <div class="form-group">
                            <label for="excerpt">Service Excerpt</label>
                            <textarea
                                id="excerpt"
                                name="excerpt"
                                class="form-control form-control-lg @error('excerpt') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="3">{{ isset( $service ) && old('excerpt') === null ? $service->excerpt : old('excerpt') }}</textarea>
                                @error('excerpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($service)
                                <input type="hidden" name="old_excerpt" value="{{ $service->excerpt }}">
                            @endisset
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    {{-- Icon --}}
                    <div class="card card-body">
                        <div class="form-group">
                            <label class="d-block">Choose Icon</label>
                            <select id="flat-icon" name="icon" class="form-control form-control-lg @error('icon') is-invalid @enderror">
                                @foreach($flat_icons as $key => $value)
                                <option {{ isset($service) && $value['icon_class'] == $service->icon ? 'selected' : '' }} value="{{ $value['icon_class']}}">{{ $value['icon_name'] }}</option>
                                @endforeach
                            </select>
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Sldier Visiblitiy --}}
                        <div class="form-check form-group">
                            <input
                                @if ( isset( $service ) && $service->visible == 1 && old('visible') === null )
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
                                for="visible">Display at home page </label>
                            @error('visible')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card card-body">
                        @if ( !isset($service) )
                            {{-- Sldier Image --}}
                            <div class="form-group">
                                <label for="image">Service Image</label>
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
                            </div>
                        @else
                            <div class="row">
                                @if($service->image !== NULL)
                                <div class="col-md-12">
                                    <img height="400" class="img-fluid" src="{{ asset( 'storage/' . $service->image ) }}" alt="{{ $service->title }}">
                                </div>
                                @endif

                                <div class="form-group">

                                    <label class="btn btn-light mt-3" for="image">
                                        {{ $service->image !== NULL ? 'Choose an other Image' : 'Upload Service Image' }}
                                    </label>
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
                            <button type="submit" class="btn btn-{{ isset( $service ) ? 'success' : 'primary' }} float-right mt-5">
                                {{ isset( $service ) ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </form>
    </div>

</div>

@endsection

@section('script')
<script src="{{ asset('js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#flat-icon').select2({
            width: 'resolve'
        });
    });
</script>
@endsection
