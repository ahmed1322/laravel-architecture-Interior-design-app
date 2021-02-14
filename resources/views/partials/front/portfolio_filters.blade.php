@if( !isset($add_filtration) || $add_filtration )
<ul class="project_filters">
    <li><a href="#" data-filter="*" class="selected btn-details">All<span class="filter-count"></span></a></li>
    @foreach($portfolios_categories as $category_id => $category_name)
        <li>
            <a
                class="btn-details"
                data-filter={{ '.category-'.$category_id }}>
                <span>{{ $category_name }}</span>
                <span class="filter-count"></span>
            </a>
        </li>
    @endforeach
</ul>
@endif
