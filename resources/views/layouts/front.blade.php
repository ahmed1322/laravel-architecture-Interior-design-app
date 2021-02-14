@include('partials.front.header.head')
<body>
    {{-- <div id="royal_preloader"></div> --}}
    <!-- <div id="royal_preloader"></div> -->
    <div id="page" class="site">
        @include('partials.front.header.nav')
        @include('partials.front.header.side_panel')
        <div id="content" class="site-content">
            @yield('content')
        </div>
    </div>
    @include('partials.front.footer.site_footer')
    @include('partials.front.footer.footer_bottom')
    @include('partials.front.footer.scripts')
    @yield('script')

    <script>
        // window.jQuery = window.$ = jQuery;
        // (function($) { "use strict";
        //     //Preloader
        //     Royal_Preloader.config({
        //         mode           :   'progress',
        //         background     :   '#1a1a1a',
        //     });
        // })(jQuery);
    </script>
</body>
</html>
