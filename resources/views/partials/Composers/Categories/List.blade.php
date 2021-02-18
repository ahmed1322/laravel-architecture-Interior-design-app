<aside class="widget widget_categories">
    <h6 class="widget-title">Categories</h6>
    <ul>
        @forelse($categories as $key => $val)
            <li><a href="{{ route('single.category.posts' , [ 'category_posts' => $key , 'slug' => str_slug($val) ]) }}">{{ $val }}</a></li>
        @empty

        @endforelse
    </ul>
</aside>
