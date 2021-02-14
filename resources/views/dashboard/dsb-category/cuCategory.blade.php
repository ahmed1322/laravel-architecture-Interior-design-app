@extends('layouts.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
    </div>

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.success_msg')
    </div>

    <div class="col-lg-6 mx-auto">

        <form method="POST" action="{{ isset( $category ) ? route('category.update', $category->slug) : route('category.store')}}" class="form-horizontal mb-5">
            @csrf
            @isset($category)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="name">Category Name</label>
                <input 
                    value="{{ isset( $category ) ? ( old('name') ? old('name') : $category->name ) : old('name') }}"
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
                @isset($category)
                    <input type="hidden" name="old_name" value="{{ $category->name }}">
                @endisset
            </div>

            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" {{ isset( $category ) && $category->visible === 1 ? 'checked' : old('visible') }} name="visible" value="1" class="custom-control-input" id="makeitvisible">
                    <label class="custom-control-label" for="makeitvisible">Make it Visible!</label>
                </div>
            </div>
            <button type="submit" class="btn btn-{{ isset( $category ) ? 'success': 'primary' }}">{{ isset( $category ) ? 'Update': 'Create' }}</button>
        </form>

    </div>
</div>
@endsection