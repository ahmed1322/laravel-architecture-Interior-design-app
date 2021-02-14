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

        <form method="POST" action="{{ isset( $page ) ? route('page.update', $page->slug) : route('page.store')}}" class="form-horizontal mb-5">
            @csrf
            @isset($page)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="name">Page Name</label>
                <input 
                    value="{{ isset( $page ) ? ( old('name') ? old('name') : $page->name ) : old('name') }}"
                    type="text"
                    id="name"
                    name="name"
                    class="form-control form-control-lg @error('name') is-invalid @enderror" 
                    placeholder="e.g Services" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @isset($page)
                    <input type="hidden" name="old_name" value="{{ $page->name }}">
                @endisset
            </div>

            <button type="submit" class="btn btn-{{ isset( $page ) ? 'success': 'primary' }}">{{ isset( $page ) ? 'Update': 'Create' }}</button>
        </form>

    </div>
</div>
@endsection