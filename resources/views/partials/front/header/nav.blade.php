<header id="site-header" class="site-header header-transparent">
    <!-- Main Header start -->
    <div class="octf-main-header">
        <div class="octf-area-wrap">
            <div class="container-fluid octf-mainbar-container">
                <div class="octf-mainbar">
                    <div class="octf-mainbar-row octf-row">
                        <div class="octf-col logo-col no-padding">
                            <div id="site-logo" class="site-logo">
                                <a href="/">
                                    @if (isset( $settings->site_logo_light ))
                                        <img

                                        src="{{ asset( 'storage/' . $settings->site_logo_light ) }}"
                                        alt="{{ $settings->site_name  }}">
                                    @else
                                        {{  isset( $settings->site_name ) ? $settings->site_name : '' }}
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="octf-col menu-col no-padding">
                            <nav id="site-navigation" class="main-navigation">
                                <ul class="menu">
                                   <li class=""><a href="/">Home</a></li>
                                    <li class=""><a href="{{ route('portfolios') }}">Portfolio</a></li>
                                    <li class=""><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route( 'page' , 'contact' ) }}">Contacts</a></li>
                                    @if(Auth::check() && Auth::user()->role_id !== -1)
                                        <li><a href="{{ route('settings.index') }}">Dashboard</a></li>
                                    @endif
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif

                                        @else
                                            @if (Route::has('logout'))
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            @endif
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                        <div class="octf-col cta-col text-right no-padding">
                        <!-- Call To Action -->
                            <div class="octf-btn-cta">

                                <div class="octf-cart octf-cta-header">
                                    <a class="cart-contents" href="cart-page.html" title="View your shopping cart">
                                        <i class="ot-flaticon-shopping-bag"></i>
                                        <span class="count">2</span>
                                    </a>

                                    <div class="site-header-cart">
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a class="remove remove_from_cart_button" href="#">×</a>
                                                        <a href="single-product.html"><img src="https://via.placeholder.com/720x853.png" class="" alt="">Velvet Teal Blue</a>
                                                        <span class="quantity">1 × <span class="amount"><bdi><span>$</span>195</bdi></span></span>
                                                    </li>
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a class="remove remove_from_cart_button" href="#">×</a>
                                                        <a href="single-product.html"><img src="https://via.placeholder.com/720x853.png" class="" alt="">Natural Pouffe</a>
                                                        <span class="quantity">1 × <span class="amount"><bdi><span>$</span>145</bdi></span></span>
                                                    </li>
                                                </ul>

                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong> <span class="amount"><bdi><span>$</span>340</bdi></span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="cart-page.html" class="button wc-forward">View cart</a>
                                                    <a href="checkout-page.html" class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="octf-search octf-cta-header">
                                    <div class="toggle_search octf-cta-icons">
                                        <i class="ot-flaticon-search"></i>
                                    </div>
                                    <!-- Form Search on Header -->
                                    <div class="h-search-form-field collapse">
                                        <div class="h-search-form-inner">
                                            <form role="search" method="get" class="search-form">
                                                <input type="search" class="search-field" placeholder="SEARCH..." value="" name="s">
                                                <button type="submit" class="search-submit"><i class="ot-flaticon-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="octf-sidepanel octf-cta-header">
                                    <div class="site-overlay panel-overlay"></div>
                                    <div id="panel-btn" class="panel-btn octf-cta-icons">
                                        <i class="ot-flaticon-menu"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_mobile">
        <div class="container-fluid">
            <div class="octf-mainbar-row octf-row">
                <div class="octf-col">
                    <div class="mlogo_wrapper clearfix">
                        <div class="mobile_logo">
                            <a href="/">
                                @if (isset( $settings->site_logo_light ))
                                    <img

                                    src="{{ asset( 'storage/' . $settings->site_logo_light ) }}"
                                    alt="{{ $settings->site_name  }}">
                                @else
                                    {{  isset( $settings->site_name ) ? $settings->site_name : '' }}
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="octf-col justify-content-end">
                    <div class="octf-search octf-cta-header">
                        <div class="toggle_search octf-cta-icons">
                            <i class="ot-flaticon-search"></i>
                        </div>
                        <!-- Form Search on Header -->
                        <div class="h-search-form-field collapse">
                            <div class="h-search-form-inner">
                                <form role="search" method="get" class="search-form">
                                    <input type="search" class="search-field" placeholder="SEARCH..." value="" name="s">
                                    <button type="submit" class="search-submit"><i class="ot-flaticon-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="octf-menu-mobile octf-cta-header">
                        <div id="mmenu-toggle" class="mmenu-toggle">
                            <button><i class="ot-flaticon-menu"></i></button>
                        </div>
                        <div class="site-overlay mmenu-overlay"></div>
                        <div id="mmenu-wrapper" class="mmenu-wrapper on-right">
                            <div class="mmenu-inner">
                                <a class="mmenu-close" href="#"><i class="ot-flaticon-right-arrow"></i></a>
                                <div class="mobile-nav">
                                    <ul id="menu-main-menu" class="mobile_mainmenu none-style">
                                        <li class="menu-item-has-children current-menu-item current-menu-ancestor">
                                            <a href="index.html">Home</a>
                                            <ul class="sub-menu">
                                                <li class="current-menu-item"><a href="index.html">Main Home</a></li>
                                                <li><a href="index-2.html">Interior Design</a></li>
                                                <li><a href="index-3.html">Studio Home</a></li>
                                                <li><a href="index-4.html">Architecture Agency</a></li>
                                                <li><a href="index-5.html">Design Company</a></li>
                                                <li><a href="index-6.html">Home Video</a></li>
                                                <li><a href="home-full-screen.html">Home Full Screen</a></li>
                                                <li><a href="one-page.html">Home One Page</a></li>
                                                <li><a href="index-sidenav.html">Home with Side Menu</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="our-services.html">Our Services</a></li>
                                                <li><a href="our-team.html">Our Team</a></li>
                                                <li><a href="single-team.html">Single Team</a></li>
                                                <li><a href="our-process.html">Our Process</a></li>
                                                <li><a href="our-studio.html">Our Studio</a></li>
                                                <li class="menu-item-has-children"><a href="shop.html">Shop</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="single-product.html">Single Product</a></li>
                                                        <li><a href="checkout-page.html">Checkout Page</a></li>
                                                        <li><a href="cart-page.html">Cart Page</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="typography.html">Typography</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="faq.html">FAQS</a></li>
                                                <li><a href="cooming-soon.html">Coming Soon</a></li>
                                                <li><a href="404-error.html">404 Error</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Services</a>
                                            <ul class="sub-menu">
                                                <li><a href="servcies-detail-1.html">Design & Planning</a></li>
                                                <li><a href="servcies-detail-2.html">Exterior Design</a></li>
                                                <li><a href="servcies-detail-3.html">Custom Solutions</a></li>
                                                <li><a href="servcies-detail-4.html">Furniture & Decor</a></li>
                                                <li><a href="servcies-detail-5.html">Creating Concept</a></li>
                                                <li><a href="servcies-detail-6.html">Author’s Control</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children"><a href="#">Portfolio Types</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="portfolio-masonry.html">Portfolio Grid Masonry</a></li>
                                                        <li><a href="portfolio-no-gap.html">Portfolio Grid No Gap</a></li>
                                                        <li><a href="portfolio-under.html">Portfolio Info Under Image</a></li>
                                                        <li><a href="portfolio-metro.html">Portfolio Metro</a></li>
                                                        <li><a href="portfolio-metro-no-gap.html">Portfolio Metro No Space</a></li>
                                                        <li><a href="portfolio-gallery.html">Portfolio Gallery</a></li>
                                                        <li><a href="portfolio-slider.html">Portfolio Slider</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">Portfolio Layout</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="portfolio-two-column.html">Two Columns</a></li>
                                                        <li><a href="portfolio-three-column.html">Three Columns</a></li>
                                                        <li><a href="portfolio-three-column-wide.html">Three Columns Wide</a></li>
                                                        <li><a href="portfolio-four-column-wide.html">Four Columns Wide</a></li>
                                                        <li><a href="portfolio-five-column-wide.html">Five Columns Wide</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">Portfolio Hover Types</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="portfolio-standar.html">Standar</a></li>
                                                        <li><a href="portfolio-detail-slider.html">Slider Images</a></li>
                                                        <li><a href="portfolio-left.html">Left Image</a></li>
                                                        <li><a href="portfolio-right.html">Right Image</a></li>
                                                        <li><a href="portfolio-small.html">Small Image</a></li>
                                                        <li><a href="portfolio-big.html">Big Image</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="image-scale.html">Image-scale</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="image-scale.html">Image Scale</a></li>
                                                        <li><a href="show-overlay-info.html">Show Overlay Info</a></li>
                                                        <li><a href="hidden-overlay-info.html">Hidden Overlay Info</a></li>
                                                        <li><a href="background-solid.html">Background Solid</a></li>
                                                        <li><a href="hidden-1.html">Hidden 1</a></li>
                                                        <li><a href="hidden-2.html">Hidden 2</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Blog Listing</a></li>
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="post.html">Blog Single</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
