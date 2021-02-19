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
                                    @can('viewAny', App\Models\Setting::class)
                                        <li><a href="{{ route('settings.index') }}">Settings</a></li>
                                    @elsecan('viewAny', App\Models\Profile::class)
                                        <li><a href="{{ route('profile.index') }}">Profile</a></li>
                                    @endcan
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
