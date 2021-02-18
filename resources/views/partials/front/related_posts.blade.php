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
                        <span class="posted-on"><a href="{{ route('date.post', $post->created_at) }}">{{ $related_post->created_at->diffForHumans() }}</a></span>
                        <span class="byline">
                            <span class="author vcard"><a class="url fn n" href="{{ route('author.post', $post->author->id ) }}">{{ $related_post->author->name }}</a></span>
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
