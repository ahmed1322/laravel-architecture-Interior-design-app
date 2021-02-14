<section class="services-1 bg-dark-theratio">
    <div class="grid-lines grid-lines-vertical">
        <span class="g-line-vertical line-left color-line-default"></span>
        <span class="g-line-vertical line-center color-line-default"></span>
        <span class="g-line-vertical line-right color-line-default"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-5 mb-lg-0">
                <div class="benefits-desc-1">
                    <div class="ot-heading">
                        <span>[ our benefits ]</span>
                        <h2 class="main-heading">Ambitious Studio with a Successful Concept &amp; Ideas</h2>
                    </div>
                    <div class="ot-button">
                        <a href="portfolio-masonry.html" class="octf-btn octf-btn-light border-hover-light">View Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @php
                        $index = 1;
                        $count = $services->count();
                        foreach ($services as $service):
                        $index++;
                    @endphp
                    <div class="col-lg-6 col-md-6 mb-5{{ $count > $index ? ' mb-md-0' : ''  }}">
                        <div class="icon-box icon-box--classic icon-box--icon-top s-light">
                            <div class="icon-main"><span class="{{ $service->icon }}"></span></div>
                            <div class="content-box">
                                <h5><a href="#" class="title-link">{{ $service->title }}</a></h5>
                                <p>{{ $service->excerpt }}</p>
                            </div>
                        </div>
                        <div class="d-none d-md-block space-70"></div>
                    </div>
                    @php endforeach; @endphp
                </div>
            </div>
        </div>
    </div>
</section>
