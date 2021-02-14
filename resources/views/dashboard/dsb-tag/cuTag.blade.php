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

        <form method="POST" action="{{ isset( $tag ) ? route('tag.update', $tag->slug) : route('tag.store')}}" class="form-horizontal mb-5">
            @csrf
            @isset($tag)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input 
                    value="{{ isset( $tag ) ? ( old('name') ? old('name') : $tag->name ) : old('name') }}"
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
                @isset($tag)
                    <input type="hidden" name="old_name" value="{{ $tag->name }}">
                @endisset
            </div>

            <button type="submit" class="btn btn-{{ isset( $tag ) ? 'success': 'primary' }}">{{ isset( $tag ) ? 'Update': 'Create' }}</button>
        </form>

    </div>
</div>
@endsection