<div id="content" class="site-content">
    <div
        class="page-header bg-dark dtable text-center header-transparent pheader-portfolio"
        style="{{ !isset($page_header_image) ? '' : 'background-image: url(' . asset( 'storage/' . $page_header_image ) . ')'   }}">
        <div class="dcell">
            <div class="container">
                <h1 class="page-title">Portfolio Info Under Image</h1>
                @include('partials.front.breadcrumb')
            </div>
        </div>
    </div>
</div>
