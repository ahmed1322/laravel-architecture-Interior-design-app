@extends('layouts.dashboard')
@php
    print_r($errors)
@endphp
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-10 mx-auto">
        <form
            enctype="multipart/form-data"
            method="POST"
            action="{{ isset( $team ) ? route('team.update', $team->id) : route('team.store') }}"
            class="form-horizontal mb-5">
            @csrf
            @isset($team)
                @method('put')
                <input type="hidden" name="id" value="{{ $team->id }}">
            @endisset

            <div class="row">
                {{-- Team Member Details [ name, role ] --}}
                <div class="col-lg-6">
                    <div class="card card-body">

                        {{-- Team Member Name --}}
                        <div class="form-group">
                            <label for="name">Team Member Name</label>
                            <input
                                value="{{ isset( $team ) ? ( old('name') ? old('name') : $team->name ) : old('name') }}"
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
                        </div>

                        {{-- Team Member Role --}}
                        <div class="form-group">
                            <label for="role">Team Member Role</label>
                            <textarea
                                id="role"
                                name="role"
                                class="form-control form-control-lg @error('role') is-invalid @enderror"
                                placeholder="e.g admin"
                                rows="3">{{ isset( $team ) && old('role') === null ? $team->role : old('role') }}</textarea>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                </div>

                {{-- Team Member Photo --}}
                <div class="col-lg-6">
                    <div class="card card-body">
                        @if ( !isset($team) )
                            {{-- Sldier Image --}}
                            <div class="form-group">
                                <label for="image">Team Image</label>
                                <input
                                    height="300"
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
                                <div class="col-md-12">
                                    <img height="300" class="rounded" src="{{ asset( 'storage/' . $team->image ) }}" alt="{{ $team->name }}">
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
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-{{ isset( $team ) ? 'success' : 'primary' }} float-right mt-3">
                            {{ isset( $team ) ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>

@endsection
