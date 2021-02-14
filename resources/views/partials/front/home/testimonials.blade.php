<section class="testi-2 bg-dark-theratio">
    <div class="container">
        <div class="row m-0">
            <div class="studio-testi-slide s-light mb-5 mb-xl-0">
                <div class="studio-testi-slide-block z-index-2 position-relative">
                    <div class="ot-heading is-dots s-light">
                        <span>[ testimonials ]</span>
                        <h2 class="main-heading">What People Say</h2>
                    </div>
                    <div class="ot-testimonials v-dark">
                        <div class="testimonials-slide-2 ot-testimonials-slider-s2 owl-theme owl-carousel owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-2224px, 0px, 0px); transition: all 0.25s ease 0s; width: 3892px;">
                                    @foreach($testimonials as $testimonial)
                                    <div class="owl-item" style="width: 556px;">
                                        <div class="testi-item">
                                            <div class="ttext">{{ substr($testimonial->content, 0 , 100) }}</div>
                                            <div class="t-head flex-middle">
                                                <div class="tinfo">
                                                    <h5>{{ $testimonial->name }}</h5>
                                                    <span>{{ $testimonial->details }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="owl-nav">
                                <button type="button" role="presentation" class="owl-prev"><i class="ot-flaticon-left-arrow"></i></button>
                                <button type="button" role="presentation" class="owl-next"><i class="ot-flaticon-right-arrow"></i></button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="studio-testi-img text-center">
                <div class="studio-testi-img-block z-index-1">
                    <img src="{{ asset('storage/site/testimonial/image2-home2.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
