<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                <div class="widget-footer">
                    <img src="{{ asset(isset($settings->site_logo_dark) ? 'storage/' .  $settings->site_logo_dark : '') }}" class="footer-logo" alt="">
                    <p>We provides a full range of interior design, architectural design.</p>
                    <div class="footer-social list-social">
                        <ul>
                            <li><a href="http://facebook.com" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="http://twitter.com" target="_self"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="http://linkedin.com" target="_self"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="http://instagram" target="_self"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                <div class="widget-footer">
                    <h6>Contacts</h6>
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-place"></i></span>
                            <span class="list-item-text">{{ $settings->site_location  ?? '' }}</span>
                        </li>
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-mail"></i></span>
                            <span class="list-item-text">{{ $settings->site_email  ?? '' }}</span>
                        </li>
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-phone-call"></i></span>
                            <span class="list-item-text">+2 {{ $settings->site_phone ?? ''  }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-md-0">
                <div class="widget-footer widget-contact">
                    <h6>Latest Projects</h6>
                    <ul>
                        <li><a href="#">Stylish Family Appartment</a></li>
                        <li><a href="#">Modern Villa in Belgium</a></li>
                        <li><a href="#">Private House in Spain</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="widget-footer footer-widget-subcribe">
                    <h6>Subscribe</h6>
                    <form class="mc4wp-form" method="post">
                        <div class="mc4wp-form-fields">
                            <div class="subscribe-inner-form">
                                <input type="email" name="EMAIL" placeholder="YOUR EMAIL" required="">
                                <button type="submit" class="subscribe-btn-icon"><i class="ot-flaticon-send"></i></button>
                            </div>
                        </div>
                    </form>
                    <p>Follow our newsletter to stay updated about agency.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #site-footer -->
