@extends('layouts.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 offset-md-3 mt-5">
                @include('partials.backend.search')
            </div>
        </div>
    </div>

    <div class="col-lg-6 mx-auto mt-2">

        <div class="card card-body">
            <div class="row mt-3">
                <div class="col">

                    @forelse($posts as $post)
                        <div class="media mt-3 border border-2 p-4">
                            <h5 class="mb-2 font-size-16 db-light">{{ $post->title }}</h5>
                            <div class="media-body">
                                <span class="text-muted font-size-12 badge badge-light text-white">{{ $post->comments->count() }} Comments</span>
                            </div>
                            <a class="btn btn-sm btn-primary" href="{{ route( 'comments.show', $post->id )}}"> See Post Comments </a>
                        </div> <!-- end comment -->
                    @empty
                        <p class="lead text-center">No Comments Found</p>
                    @endforelse

                </div> <!-- end col -->
            </div>
        </div>
        {{ $posts->links( 'partials.backend.pagination' ) }}
    </div>
</div>

@endsection
