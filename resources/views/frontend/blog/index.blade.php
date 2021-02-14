@extends('layouts.front')
@section('content')

<div class="entry-content">
    <div class="container">
        <div class="row">
            @forelse ($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="post-box masonry-post post-item">
                    <div class="post-inner">
                        <div class="entry-media post-cat-abs">
                            <a href="{{ route('blog.single' , [ 'post' => $post->id, 'slug' => $post->slug ] ) }}">
                                <img height="400" src="{{ $post->image }}" alt="{{$post->title}}"
                                    style="height: 300px;width: 100%;">
                            </a>
                            <div class="post-cat">
                                <div class="posted-in">
                                    <a href="{{ route('single.category.posts', [ 'category_posts' => $post->category->id, 'slug' => $post->category->slug ] ) }}">
                                        {{ $post->category->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="inner-post">
                            <div class="entry-header">
                                <div class="entry-meta">
                                    <span class="posted-on"><a href="{{ route('date.post', $post->created_at->format('Y-m-d')) }}">{{ $post->created_at->format('d F Y') }}</a></span>
                                    <span class="byline">
                                        <span class="author vcard"><a class="url fn n" href="{{ route('author.post' , $post->author->id ) }}">{{ $post->author->name }}</a></span>
                                    </span>
                                </div><!-- .entry-meta -->

                                <h5 class="entry-title">
                                    <a class="title-link" href="{{ route('blog.single', [ 'post' => $post->id, 'slug' => $post->slug ]  ) }}">{{ $post->title }}</a>
                                </h5>
                            </div><!-- .entry-header -->

                            <div class="the-excerpt">
                            </div><!-- .entry-content -->
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="lead">No Posts Found</p>
            @endforelse

            @if ($posts)
                {{ $posts->links('partials.front.pagination') }}
            @endif
        </div>
    </div>
</div>

@endsection
