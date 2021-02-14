<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard - {{ isset($settings->site_name) ? $settings->site_name : '' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="">

        {{-- csrf-token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
        .navbar-custom {
            background-color: #323742;
            -webkit-box-shadow: 0 0.05rem 0.01rem rgba(161, 168, 184, 0.075);
            box-shadow: 0 0.05rem 0.01rem rgba(161, 168, 184, 0.075);
        }
        .navbar-custom .topnav-menu .nav-link {
            padding: 0 15px;
            color: #6e768e;
            min-width: 32px;
            display: block;
            line-height: 72px;
            text-align: center;
            max-height: 72px;
        }
            .navbar-custom .topnav-menu .nav-link svg {
                color: #6e768e;
                fill: rgba(110,118,142,.12);
            }
        </style>
        @yield('style')
    </head>
