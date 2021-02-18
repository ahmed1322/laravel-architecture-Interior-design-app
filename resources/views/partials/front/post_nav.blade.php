<div class="post-nav clearfix">
    @if(! is_null($prev))
    <div class="post-prev">
        <a href="{{ route('blog.single', [ 'post' => $prev->id, 'slug' => $prev->slug ] ) }}">
            <div class="thumb-post-prev"><img src="{{ $prev->image }}" alt=""></div>
            <div class="info-post-prev">
                <h6><span class="title-link">{{ $prev->title }}</span></h6>
                <span>{{ $prev->created_at->diffForHumans() }}</span>
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
                <span>{{ $next->created_at->diffForHumans() }}</span>
            </div>
        </a>
    </div>
    @endif

</div>
