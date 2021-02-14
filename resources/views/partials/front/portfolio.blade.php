<section class="our-portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center theratio-align-center">
                <div class="project-filter-wrapper">

                    @include( 'partials.front.portfolio_filters' )

                    <div class="projects-grid pf_3_cols style-3 img-scale w-auto">
                        <div class="grid-sizer"></div>
                        @foreach($portfolios as $portfolio)
                        <div class="project-item category-{{ $portfolio->category->id }} ">
                            <div class="projects-box">
                                <div class="projects-thumbnail">
                                    <a href="{{ route('portfolio.single', ['portfolio' => $portfolio->id, 'slug' => $portfolio->slug]) }}">
                                        <img src="{{asset( 'storage/' . $portfolio->image )}}" alt="">
                                    </a>
                                    <div class="overlay">
                                        <h5>{{$portfolio->title}}</h5>
                                        <i class="ot-flaticon-add"></i>
                                    </div>
                                </div>
                                <div class="portfolio-info">
                                    <div class="portfolio-info-inner text-center">
                                        <h5><a class="title-link" href="{{ route('portfolio.single', ['portfolio' => $portfolio->id, 'slug' => $portfolio->slug]) }}">{{$portfolio->title}}</a></h5>
                                        <p class="portfolio-cates"><a href="{{ route( 'single.category.portfolios', [ 'category_portfolios' => $portfolio->category->id, 'slug' => $portfolio->category->slug ] ) }}">{{ $portfolio->category->name }}</a></p>
                                    </div>
                                    <a class="overlay" href="{{ route('portfolio.single', ['portfolio' => $portfolio->id, 'slug' => $portfolio->slug ]) }}"></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if( !isset($add_pagination) || !$add_pagination )
                    <div class="btn-block text-center">
                        <a href="{{ route('portfolios') }}" class="btn-loadmore octf-btn">Read More</a>
                    </div>
                    @else
                        {{ $portfolios->links('partials.front.pagination') }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
