@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-10 mx-auto">
        <form
            enctype="multipart/form-data"
            method="POST"
            action="{{ isset( $portfolio ) ? route('portfolio.update', $portfolio->id) : route('portfolio.store') }}"
            class="form-horizontal mb-5">
            @csrf
            @isset($portfolio)
                @method('put')
                <input type="hidden" name="id" value="{{ $portfolio->id }}">
            @endisset



            <div class="row">
                <div class="col-lg-7">
                    {{-- Portfolio Title && Description --}}
                    <div class="card card-body">
                        {{-- Portfolio Title --}}
                        <div class="form-group">
                            <label for="title">Portfolio Title</label>
                            <input
                                value="{{ isset( $portfolio ) ? ( old('title') ? old('title') : $portfolio->title ) : old('title') }}"
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
                            @isset($portfolio)
                                <input type="hidden" name="old_title" value="{{ $portfolio->title }}">
                            @endisset
                        </div>

                        {{-- Portfolio Description --}}
                        <div class="form-group">
                            <label for="description">Portfolio Description</label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="6"
                                cols="10">{{ isset( $portfolio ) && old('description') === null ? $portfolio->description : old('description') }}</textarea>
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
                            @isset($portfolio)
                                <input type="hidden" name="old_description" value="{{ $portfolio->description }}">
                            @endisset
                        </div>
                    </div>

                    {{-- Portfolio Link --}}
                    <div class="card card-body">
                        {{-- Portfolio Title --}}
                        <div class="form-group">
                            <label for="link">Project Link</label>
                            <input
                                value="{{ isset( $portfolio ) ? ( old('link') ? old('link') : $portfolio->link ) : old('link') }}"
                                type="text"
                                id="link"
                                name="link"
                                class="form-control form-control-lg @error('link') is-invalid @enderror"
                                placeholder="e.g admin" />
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($portfolio)
                                <input type="hidden" name="old_link" value="{{ $portfolio->link }}">
                            @endisset
                        </div>
                    </div>

                    {{-- Portfolio Date --}}
                    <div class="card card-body">
                        {{-- Portfolio Title --}}
                        <div class="form-group">
                            <label for="created_at">Project Created at</label>
                            <input
                                value="{{ isset( $portfolio ) ? ( old('created_at') ? old('created_at') : $portfolio->created_at ) : old('created_at') }}"
                                type="text"
                                id="created_at"
                                name="created_at"
                                class="form-control form-control-lg @error('created_at') is-invalid @enderror" />
                                @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($portfolio)
                                <input type="hidden" name="old_created_at" value="{{ $portfolio->created_at }}">
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-1">

                    <div class="card card-body">

                        {{-- Include Category Dropdown --}}
                        @include( 'partials.Composers.Categories.dropdown', [
                            'label_key_name' => 'Portfolio',
                        ])
                    </div>

                    <div class="card card-body">
                        @if (! isset($portfolio) )
                            {{-- Sldier Image --}}
                            <div class="form-group">
                                <label class="btn btn-success mt-3" for="image">Choose Portfolio Image</label>
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
                                @isset($portfolio)
                                    <input type="hidden" name="old_image" value="{{ $portfolio->image }}">
                                @endisset
                            </div>

                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <img height="200" class="rounded w-100" src="{{ asset( 'storage/' . $portfolio->image ) }}" alt="{{ $portfolio->title }}">
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

                    <button type="submit" class="btn btn-block btn-{{ isset( $portfolio ) ? 'success' : 'primary' }} float-right mt-5">
                        {{ isset( $portfolio ) ? 'Update' : 'Create' }}
                    </button>

                </div>

            </div>

        </form>
    </div>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#created_at",{
        dateFormat: "Y-m-d"
    });
</script>
@endsection
