@extends('layouts.front')

@section('content')
@include( 'partials.front.inner_pages_banner', [
    'page_header_image' => $portfolio->image,
    'breadcrubm' => 'portfolio',
    'model' => $portfolio
] )
<section class="portfolio-detail p-0">
    <div class="container">
        <div class="row">
            <div class="space-90"></div>
            <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                <div class="image-gallery">
                    <div id="gallery-2" class="gallery gallery-columns-1 s2">
                        <figure class="gallery-item">
                            <div class="gallery-icon portrait">
                                <a href="{{ asset( 'storage/' . $portfolio->image) }}">
                                    <img src="{{ asset( 'storage/' . $portfolio->image) }}" alt="" />
                                    <span class="overlay"><i class="ot-flaticon-add"></i></span>
                                </a>
                            </div>
                        </figure>
                        <figure class="gallery-item">
                            <div class="gallery-icon portrait">
                                <a href="https://via.placeholder.com/1440x830.png">
                                    <img src="https://via.placeholder.com/720x720.png" alt="" />
                                    <span class="overlay"><i class="ot-flaticon-add"></i></span>
                                </a>
                            </div>
                        </figure>
                        <figure class="gallery-item">
                            <div class="gallery-icon portrait">
                                <a href="https://via.placeholder.com/1440x830.png">
                                    <img src="https://via.placeholder.com/720x720.png" alt="" />
                                    <span class="overlay"><i class="ot-flaticon-add"></i></span>
                                </a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="content">
                    {{ $portfolio->description }}
                </div>

                <p>
                    <strong>Biophilia is the idea that humans possess an innate tendency to seek connections with nature.</strong> The term translates to ‘the love of living things’ in ancient Greek (philia = the love of / inclination
                    towards), and was used by German-born American psychoanalyst Erich Fromm in The Anatomy of Human Destructiveness (1973), which described biophilia as “the passionate love of life and of all that is alive.” The term was
                    later used by American biologist Edward O. Wilson in his work Biophilia (1984), which proposed that the tendency of humans to focus on and to affiliate with nature and other life-forvms.
                </p>
                <div class="space-20"></div>
                <div class="space-5"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>architect:</h6>
                            <p>David Oswald</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>client:</h6>
                            <p>OceanThemes</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>Terms:</h6>
                            <p>6 month</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>project type:</h6>
                            <p>Interior Design</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>Strategy:</h6>
                            <p>Minimalistic</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="p-detail-info">
                            <h6>date:</h6>
                            <p>November 22, 2020</p>
                        </div>
                        <div class="space-20"></div>
                    </div>
                    <div class="col-12">
                        <div class="text-left share-portfolio">
                            <a class="twit" target="_blank" href="twitter.com" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a class="face" target="_blank" href="facebook.com" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a class="pint" target="_blank" href="pinterest.com" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                            <a class="linked" target="_blank" href="linkedin.com" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="project-bottom">
                    <div class="single-portfolio-navigation post-nav clearfix">

                        @if($prev)
                        <div class="post-prev">
                            <a href="{{ route( 'portfolio.single', [ 'portfolio' => $prev->id, 'slug' => $prev->slug ] ) }}">
                                <div class="thumb-post-prev"><img src="{{ asset( 'storage/' . $prev->image ) }}" alt="{{ $prev->title }}" /></div>
                                <div class="info-post-prev">
                                    <h6><span class="title-link">{{ $prev->title }}</span></h6>
                                    <span>[ {{ $prev->category->name }} ]</span>
                                </div>
                            </a>
                        </div>
                        @endif

                        @if($next)
                        <div class="post-next">
                            <a href="{{ route( 'portfolio.single', [ 'portfolio' => $next->id, 'slug' => $next->slug ] ) }}">
                                <div class="thumb-post-next"><img src="{{ asset( 'storage/' . $next->image ) }}" alt="{{ $next->title }}" /></div>
                                <div class="info-post-next">
                                    <div class="info-post-next">
                                        <h6><span class="title-link">{{ $next->title }}</span></h6>
                                        <span>[ {{ $next->category->name }} ]</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif

                    </div>
                    @if ($related)
                    <div class="portfolio-related-posts-wrap">
                        <div class="portfolio-related-title-wrap">
                            <h2 class="portfolio-related-title">Related Projects</h2>
                        </div>
                        <div class="row">
                            <div class="projects-grid pf_3_cols style-1 img-scale w-auto m-0">
                                @foreach($related as $portfolio)
                                <div class="project-item category-14">
                                    <div class="projects-box">
                                        <div class="projects-thumbnail">
                                            <a href="{{ route( 'portfolio.single', [ 'portfolio' => $portfolio->id, 'slug' => $portfolio->slug ]  ) }}">
                                                <img src="{{ asset( 'storage/' . $portfolio->image ) }}" alt="{{ $portfolio->title }}" />
                                            </a>
                                            <div class="overlay">
                                                <h5>{{ $portfolio->title }}</h5>
                                                <i class="ot-flaticon-add"></i>
                                            </div>
                                        </div>
                                        <div class="portfolio-info">
                                            <div class="portfolio-info-inner">
                                                <h5><a class="title-link"
                                                    href="{{ route( 'portfolio.single', [ 'portfolio' => $portfolio->id, 'slug' => $portfolio->slug ]  ) }}">{{ $portfolio->title }}</a></h5>
                                                <p class="portfolio-cates">
                                                    <a
                                                        href="{{ route( 'single.category.portfolios',  [
                                                            'category_portfolios' => $portfolio->category->id ,
                                                            'slug' => $portfolio->category->slug ] )  }}">{{ $portfolio->category->name }}</a>
                                                </p>
                                            </div>
                                            <a class="overlay" href="{{ route( 'portfolio.single', [ 'portfolio' => $portfolio->id, 'slug' => $portfolio->slug ]  ) }}"></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
