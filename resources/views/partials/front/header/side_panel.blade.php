<div id="side-panel" class="side-panel">
    <a href="#" class="side-panel-close"><i class="ot-flaticon-close-1"></i></a>
    <div class="side-panel-block">
        <div class="side-panel-wrap">
            <div class="the-logo">
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

            <div class="ot-heading ">
                <h2 class="main-heading">Contact Info</h2>
            </div>
            <div class="side-panel-cinfo">
                <ul class="panel-cinfo">
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-place"></i></span>
                        <span class="panel-list-text">{{ $settings->site_name }}</span>
                    </li>
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-mail"></i></span>
                        <span class="panel-list-text">{{ $settings->site_email }}</span>
                    </li>
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-phone-call"></i></span>
                        <span class="panel-list-text">{{ $settings->site_phone }}</span>
                    </li>
                </ul>
            </div>
            <div class="side-panel-social">
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
