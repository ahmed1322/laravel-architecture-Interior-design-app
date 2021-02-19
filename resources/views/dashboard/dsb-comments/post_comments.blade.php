@extends('layouts.dashboard')
@section('dashboard')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 offset-md-3 mt-5">
                @include('partials.backend.search')
            </div>
        </div>
    </div>
    <div class="col-lg-6 mx-auto mt-5">
        <div class="card card-body">
            <h5 class="mb-2 font-size-16 db-light">
                <span>{{ $post->title }}</span>
                <span class="float-right text-muted font-size-12 badge badge-light text-white">{{ $post->comments->count() }} Comments</span>
            </h5>
        </div>

        <div class="card card-body">
            <div class="row mt-3">
                <div class="col">
                    @forelse($comments as $comment)
                        <div class="media mt-3 border border-2 p-4">
                            <img src="{{ Gravatar::src($comment->author->email) }}" class="mr-2 rounded-circle" height="36" alt="Arya Stark">
                            <div class="media-body">
                                <h5 class="mt-0 mb-0 font-size-14">
                                    <span class="float-right text-muted font-size-12">{{ $comment->created_at->diffForHumans()  }}</span>
                                    {{ $comment->author->name }}
                                </h5>
                                <p class="lead">{{ $comment->comment }}</p>
                                <a class="btn btn-sm btn-primary" href="{{ $comment['post_id'] }}">
                                    <span class="uil uil-comments-alt"></span>
                                    <span>Reply</span>
                                 </a>
                            </div>
                        </div> <!-- end comment -->
                    @empty
                        <p class="lead text-center">No Comments Found</p>
                    @endforelse

                </div> <!-- end col -->
            </div>


        </div>

        {{ $comments->links( 'partials.backend.pagination' ) }}

    </div>
@endsection
