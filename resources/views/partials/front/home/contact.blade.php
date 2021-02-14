<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                <div class="contact-left">
                    <h2>Get in Touch</h2>
                    <p class="font14">Your email address will not be published. Required fields are marked *</p>
                    <form action={{ route('home.contact') }} method="post" class="wpcf7">
                        @csrf
                        <div class="main-form">
                            <p>
                                <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                size="40"
                                class="@error('name') is-invalid @enderror"
                                aria-invalid="false"
                                placeholder="Your Name *">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </p>
                            <p>
                                <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                size="40"
                                class="@error('email') is-invalid @enderror"
                                aria-invalid="false"
                                placeholder="Your Email *">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </p>
                            <p>
                                <textarea
                                name="message"
                                cols="40"
                                rows="10"
                                class="@error('message') is-invalid @enderror"
                                aria-invalid="false"
                                placeholder="Message...">{{ old('message') }}</textarea>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </p>
                            <p><button type="submit" class="octf-btn">Send Message</button></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-right" style="background-image: url('images/bg1-contact.jpg');">
                    <div class="ot-heading">
                        <span>[ our contact details ]</span>
                        <h2 class="main-heading">Let's Start a Project</h2>
                    </div>
                    <p>Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.</p>
                    <div class="contact-info">
                        <i class="ot-flaticon-place"></i>
                        <div class="info-text">
                            <h6>OUR ADDRESS:</h6>
                            <p>{{ $settings->site_location ?? '' }}</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <i class="ot-flaticon-mail"></i>
                        <div class="info-text">
                            <h6>OUR MAILBOX:</h6>
                            <p><a href="mailto:theratio_interior@mail.com">{{ $settings->site_location ?? '' }}</a></p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <i class="ot-flaticon-phone-call"></i>
                        <div class="info-text">
                            <h6>OUR PHONE:</h6>
                            <p><a href="+2{{ $settings->site_phone ?? '' }}">+2{{ $settings->site_phone ?? '' }}</a></p>
                        </div>
                    </div>
                    <div class="list-social">
                        <ul>
                            <li><a href="http://twitter.com" target="_self"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="http://facebook.com" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="http://linkedin.com" target="_self"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="http://instagram" target="_self"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
