@extends('layouts.front')

@section('content')

@include( 'partials.front.inner_pages_banner', [
    'page_title' => $post->title,
    'breadcrubm' => 'post',
    'model' => $post
]);

<div class="entry-content">
    <div class="container">
        <div class="row">
            <div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <article class="blog-post post-box">
                    <div class="entry-media post-cat-abs">
                        <img style="height: 600px;width: 100%;" src="{{ $post->image }}" alt="">
                        <div class="post-cat">
                            <div class="posted-in"><a href="{{ route('single.category.posts', [
                                'category_posts' => $post->category->id,
                                'slug' => $post->category->slug
                             ] ) }}">{{ $post->category->name }}</a></div>
                        </div>
                    </div>
                    <div class="inner-post">
                        <header class="entry-header">
                            <div class="entry-meta">
                                <span class="posted-on"><a href="{{ route('date.post', $post->created_at) }}">{{ $post->created_at->format('d Y F') }}</a></span>
                                <span class="byline"><a class="url fn n" href="{{ route('author.post', $post->author->id ) }}">{{ $post->author->name }}</a></span>
                                <span class="comment-num"><a href="#">{{ $post->comments->count() }} Comments</a></span>
                            </div>
                            <h3 class="entry-title">{{ $post->title }}</h3>
                        </header>
                        <div class="entry-summary the-excerpt">
                            {!! $post->content !!}
                        </div>
                        <div class="entry-footer clearfix">
                            @if($post->tags->count())
                            <div class="tagcloud">
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('tag.single', $tag->slug) }}" rel="tag">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        @include('partials.front.post_nav')

                        @if(! is_null($related))
                        <div class="related-posts">
                            <h3>Related Posts</h3>
                            <div class="row">
                                @include('partials.front.related_posts')
                            </div>
                        </div>
                        @endif
                    </div>
                </article>

                <div id="comments" class="comments-area">
                    @include('partials.front.comments')
                </div>
                <div class="comment-respond">
                    @include('partials.front.comment_respond_form')
                </div>
            </div>
            <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                @include('partials.front.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
