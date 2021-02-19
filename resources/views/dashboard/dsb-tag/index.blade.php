@extends('layouts.dashboard')
@section('dashboard')
<div class="container">
<div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
        @include('inc.success_msg')
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <a href="{{ route('tag.create') }}" class="btn btn-primary">Create a new tag</a>
            </div>

            <div class="col-lg-6 ">
                @include('partials.backend.search')
            </div>
        </div>
    </div>
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title mt-0 mb-3">Categories</h3>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">created at</th>
                                <th scope="col">Posts Count</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $tag)

                                <tr>
                                    <th>{{ $tag->name }}</th>
                                    <td>{{ $tag->created_at->format('d F Y') }}</td>
                                    <td>{{ $tag->posts->count() }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('tag.edit', $tag->slug) }}" class="btn btn-sm btn-success mr-2">Update</a>
                                            <form action="{{ route('tag.destroy', $tag->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <p class="lead">No Post Found</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{ $tags->links( 'partials.backend.pagination' ) }}
    </div>
</div>
@endsection
