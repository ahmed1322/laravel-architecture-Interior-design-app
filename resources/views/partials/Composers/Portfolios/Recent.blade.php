<div class="widget-footer widget-contact">
    <h6>Latest Projects</h6>
    <ul>
    @forelse($recent_portfolios as $id => $title)
        <li><a href="{{ route('portfolio.single' , ['portfolio' => $id , 'slug' => str_slug($title)]) }}">{{ $title }}</a></li>
    @empty
    @endforelse
    </ul>

</div>
