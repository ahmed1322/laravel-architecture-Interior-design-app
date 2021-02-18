{{-- @dump($tags) --}}
<aside class="widget widget__cloud">
    <h6 class="widget-title">Tags</h6>
    <div class="tagcloud">
    @forelse($tags as $tag)
        <a href="{{ route( 'tag.single',  str_slug($tag->name) )  }}">{{ $tag->name }}</a>
        @empty
    @endforelse
    </div>
</aside>
