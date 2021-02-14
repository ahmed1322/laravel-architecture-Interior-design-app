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
                            <div class="share-post">
                                <a class="twit" target="_blank" href="twitter.com" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a class="face" target="_blank" href="facebook.com" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a class="pint" target="_blank" href="pinterest.com" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                                <a class="linked" target="_blank" href="linkedin.com" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="author-bio">
                            <div class="author-image"><img src="{{ Gravatar::src($post->author->email) }}" alt="{{$post->author->name}}" class="avatar"></div>
                            <div class="author-info">
                                <h5>{{ $post->author->name }}</h5>
                                <p class="des">{{ $post->author->about }}</p>
                                <div class="author-socials">
                                    <a href="twitter.com" target="_blank" title="Twitter" class="tooltip"><i class="fab fa-twitter"></i> </a>
                                    <a href="facebook.com" target="_blank" title="Facebook" class="tooltip"><i class="fab fa-facebook-f"></i> </a>
                                    <a href="linkedin.com" target="_blank" title="LinkedIn" class="tooltip"><i class="fab fa-linkedin-in"></i> </a>
                                    <a href="instagram.com" target="_blank" title="Instagram" class="tooltip"><i class="fab fa-instagram"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-nav clearfix">
                            @if(! is_null($prev))
                            <div class="post-prev">
                                <a href="{{ route('blog.single', [ 'post' => $prev->id, 'slug' => $prev->slug ] ) }}">
                                    <div class="thumb-post-prev"><img src="{{ $prev->image }}" alt=""></div>
                                    <div class="info-post-prev">
                                        <h6><span class="title-link">{{ $prev->title }}</span></h6>
                                        <span>{{ $prev->created_at->format( 'd M Y' ) }}</span>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if(! is_null($next))
                            <div class="post-next">
                                <a href="{{ route('blog.single', [ 'post' => $next->id, 'slug' => $next->slug ] ) }}">
                                    <div class="thumb-post-next"><img src="{{ $next->image }}" alt=""></div>
                                    <div class="info-post-next">
                                        <h6><span class="title-link">{{ $next->title }}</span></h6>
                                        <span>{{ $next->created_at->format( 'd M Y' ) }}</span>
                                    </div>
                                </a>
                            </div>
                            @endif

                        </div>

                        @if(! is_null($related))
                        <div class="related-posts">
                            <h3>Related Posts</h3>
                            <div class="row">
                                @foreach ($related as $related_post)
                                <div class="col-lg-6 col-md-6">
                                    <div class="post-box post-item">
                                        <div class="post-inner">
                                            <div class="entry-media post-cat-abs">
                                                <a href="post.html"><img  style="height: 300px;width: 100%;" src="{{ $related_post->image }}" alt=""></a>
                                                <div class="post-cat">
                                                    <div class="posted-in"><a href="{{ route('single.category.posts', [
                                                                            'category_posts' => $post->category->id,
                                                                            'slug' => $post->category->slug
                                                                        ] ) }}">{{ $related_post->category->name }}</a></div>
                                                </div>
                                            </div>
                                            <div class="inner-post">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <span class="posted-on"><a href="#">{{ $related_post->created_at->format('d Y F') }}</a></span>
                                                        <span class="byline">
                                                            <span class="author vcard"><a class="url fn n" href="#">{{ $related_post->author->name }}</a></span>
                                                        </span>
                                                    </div><!-- .entry-meta -->

                                                    <h5 class="entry-title">
                                                        <a class="title-link" href="{{ route('blog.single', [ 'post' => $related_post->id, 'slug' => $related_post->slug ] ) }}">{{ $related_post->title }}</a>
                                                    </h5>
                                                </div><!-- .entry-header -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </article>

                <div id="comments" class="comments-area">
                    <h3 class="comments-title">Comments <span>({{ $post->comments->count() }})</span></h3>
                        @forelse ($post->comments as $comment)

                        <ol class="comment-list">
                            <li class="comment even thread-even comment-item">
                                <article class="comment-wrap clearfix">
                                    <div class="gravatar">
                                        <img src="{{ Gravatar::src($comment->author->email)  }}" alt="{{ $comment->author->name }}" class="avatar">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h6 class="comment-author">{{ $comment->author->name }}</h6>
                                            {{-- format('d Y M') --}}
                                            <span class="comment-time">{{ $comment->created_at->diffForHumans()  }}</span>
                                            <div class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></div>
                                        </div>
                                        <div class="comment-text">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        </ol>
                        {{-- <ul class="children">
                            <li class="comment odd alt comment-item">
                                <article class="comment-wrap clearfix">
                                    <div class="gravatar">
                                        <img src="{{ Gravatar::src($comment->author->email)  }}" alt="{{ $comment->author->name }}" class="avatar">
                                    </div>

                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h6 class="comment-author">Frank Barry</h6>
                                            <span class="comment-time">2 Days ago</span>
                                            <div class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></div>
                                        </div>
                                        <div class="comment-text">
                                            <p>I think natural materials has memory and appreciates to the culture, roots, archetypes.</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <!-- #comment-## -->
                        </ul> --}}
                        @empty
                            <p class="lead">No Comments Yet</p>
                        @endforelse
                </div>
                <div class="comment-respond">
                    <h3 class="comment-reply-title">Leave a comment</h3>
                    @if ( Auth::check() )
                    <form action="{{ route('comment.add', [ 'post' => $post->slug, 'user' => auth()->user()->id ]) }}" method="post" class="comment-form">
                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                        {{-- <div class="row">
                            <p class="comment-form-author col-md-6">
                                <input id="author" name="name" type="text" value="" size="30" placeholder="Name*" required="">
                            </p>
                            <p class="comment-form-email col-md-6">
                                <input id="email" name="email" type="text" value="" size="30" placeholder="Email*" required="">
                            </p>
                        </div> --}}
                        <p class="comment-form-comment">
                            <div class="form-group">
                                @csrf
                            </div>
                            <div class="form-group">
                                <label for="comment"> Add Comment</label>
                                <textarea
                                    id="comment"
                                    name="comment"
                                    cols="45"
                                    rows="8"
                                    class="@error('comment') is-invalid @enderror"
                                    placeholder="Comment*">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="octf-btn" value="Post Comment">
                        </p>
                    </form>
                    @else
                        <p class="lead">Please Login to Add Comment</p>
                        <a class="btn btn-lg btn-success" href="{{ route('login') }}">Login</a>
                    @endif
                </div>
            </div>
            <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                {{-- <aside id="author_widget-1" class="widget engitech_author-widget">
                    <div class="author-widget_wrapper text-center">
                        <div class="author-widget_image-wrapper">
                            <img class="author-widget_image" src="https://via.placeholder.com/150x150.png" alt="Kate Olson">
                        </div>
                        <div class="author-widget_info">
                            <h5 class="author-widget_title">Kate Olson</h5>
                            <p class="author-widget_text">She is the CEO. She's a big fan her cat Tux, & dinner parties.</p>
                            <div class="author-widget_social">
                                <a class="social-twitter" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="social-facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="social-linkedin" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-instagram" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </aside> --}}
                <aside id="search-2" class="widget widget_search">
                    <form role="search" method="get" id="search-form" class="search-form">
                        <input type="search" class="search-field" placeholder="Search…" value="" name="s">
                        <button type="submit" class="search-submit"><i class="ot-flaticon-search"></i></button>
                    </form>
                </aside>
                <aside class="widget widget_categories">
                    <h6 class="widget-title">Categories</h6>
                    <ul>
                        <li><a href="#">Design</a> <span class="count">(3)</span></li>
                        <li><a href="#">Development</a> <span class="count">(5)</span></li>
                        <li><a href="#">Startup</a> <span class="count">(1)</span></li>
                        <li><a href="#">Technology</a> <span class="count">(3)</span></li>
                    </ul>
                </aside>
                <aside class="widget widget_recent_news">
                    <h6 class="widget-title">Recent Posts</h6>
                    <ul class="recent-news clearfix">
                        <li class="clearfix">
                            <div class="thumb">
                                <a href="post.html"><img src="https://via.placeholder.com/150x150.png" alt=""></a>
                            </div>
                            <div class="entry-header">
                                <h6><a href="post.html">Plan Your Project  with Your Software</a></h6>
                                <span class="post-on"><span class="entry-date">November 21, 2019</span></span>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="thumb">
                                <a href="post.html"><img src="https://via.placeholder.com/150x150.png" alt=""></a>
                            </div>
                            <div class="entry-header">
                                <h6><a href="post.html">You have a Great  Business Idea?</a></h6>
                                <span class="post-on"><span class="entry-date">November 21, 2019</span></span>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="thumb">
                                <a href="post.html"><img src="https://via.placeholder.com/150x150.png" alt=""></a>
                            </div>
                            <div class="entry-header">
                                <h6><a href="post.html">Building Data Analytics  Software</a></h6>
                                <span class="post-on"><span class="entry-date">September 24, 2019</span></span>
                            </div>
                        </li>
                    </ul>
                </aside>
                <aside class="widget widget_tag_cloud">
                    <h6 class="widget-title">Tags</h6>
                    <div class="tagcloud">
                        <a href="#">business</a>
                        <a href="#">marketing</a>
                        <a href="#">SEO</a>
                        <a href="#">SMM</a>
                        <a href="#">solution</a>
                        <a href="#">startup</a>
                        <a href="#">strategy</a>
                        <a href="#">tips</a>
                    </div>
                </aside>
                <aside class="widget widget_media_image text-center">
                    <a href="contact.html"><img src="https://via.placeholder.com/270x330.png" alt=""></a>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
