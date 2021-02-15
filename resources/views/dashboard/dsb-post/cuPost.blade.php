@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/trix.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap.css') }}">

@endsection
@section('dashboard')
    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ isset($post) ? route('post.update', $post->id ) : route('post.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            @isset($post)
                                @method('put')
                            @endisset
                        </div>
                        <div class="form-group">
                            <label for="title">Post title <sup class="text-danger"></sup></label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                placeholder="e.g ..."
                                value="{{ isset($post) ? $post->title : old('title') }}" />
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @isset($post)
                                <input name="old_title" type="hidden" value="{{ $post->title }}">
                            @endisset
                        </div>

                        <div class="form-group">
                            <label for="content">Post Content<sup class="text-danger"></sup></label>
                            <input
                                name="content"
                                value="{{ isset($post) ? $post->content : old('content')  }}"
                                type="hidden"
                                id="content"
                                class="form-control form-control-lg @error('content') is-invalid @enderror">
                                <trix-editor input="content"></trix-editor>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="categories"class="form-label">Select a Category</label>
                            <select id="categories" name="category_id" class="form-control form-control-lg mb-3 @error('category_id') is-invalid @enderror">
                                    <option value="...">...</option>
                                    @foreach($categories as $category)
                                        <option 
                                            value="{{ $category->id }}" 
                                            {{ isset($post) ? ($post->category->id === $category->id && ! old('category_id') ? 'selected' : ( old('category_id') === $category->id ? 'selected' : '' ) ) : ( old('category_id') === $category->id ? 'selected' : '' ) }}>{{ $category->name }}</option>
                                    @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags"class="form-label">Select Tags</label>
                            <select id="tags" multiple name="tag_id[]" class="form-control form-control-lg mb-3 @error('tag_id') is-invalid @enderror">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                        {{ isset($post) && $post->hasTag($tag->id) ?  'selected' : '' }}>{{ $tag->name }}</option>
                                    @endforeach
                                    @error('tag_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </select>
                        </div>
                        <button type="submit" class="btn {{ isset($post) ? 'btn-primary' : 'btn-success' }} mt-3">{{ isset( $post ) ? 'Update' : 'Publish' }}</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/trix.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#categories, #tags").select2({
                theme: "bootstrap"
            });
        });
    </script>
@endsection