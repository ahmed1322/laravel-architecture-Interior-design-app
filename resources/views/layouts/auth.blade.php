@include('partials.auth.header.head')
<body class="authentication-bg">
    <div class="account-pages my-5">
        @yield('auth')
    </div>
    @include('partials.auth.footer.footer')
    @yield('script')
</body>
</html>