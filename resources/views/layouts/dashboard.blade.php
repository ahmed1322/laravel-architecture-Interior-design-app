@include('partials.backend.header.head')
<body class="left-side-menu-dark">
    <!-- Begin page -->
    <div id="wrapper">
        @include('partials.backend.header.navbar')
        @include('partials.backend.header.side_menu')
        <div class="content-page">
            <div class="content">
                @yield('dashboard')
            </div>
            @include('partials.backend.footer.footer')
        </div>
    </div>
    @include('partials.backend.footer.scripts')
    @yield('scripts')
</body>
</html>
