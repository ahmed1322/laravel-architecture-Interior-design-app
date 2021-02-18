
<aside class="widget widget_recent_news">
    <h6 class="widget-title">Recent Posts</h6>
    <ul class="recent-news clearfix">
        @forelse($recent_posts as $post)
        <li class="clearfix">
            <div class="thumb">
                <a href="{{ route('blog.single' , [ 'post' => $post->id, 'slug' => $post->slug ]) }}"><img src="{{ $post->image }}" alt=""></a>
            </div>
            <div class="entry-header">
                <h6><a href="{{ route('blog.single' , [ 'post' => $post->id, 'slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                <span class="post-on"><span class="entry-date">{{ $post->created_at->diffForHumans() }}</span></span>
            </div>
        </li>
        @empty

        @endforelse
    </ul>
</aside>
