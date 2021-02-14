@extends('layouts.front')

@section('content')

    @include('partials.front.sliders.slider-rev')
    @include('partials.front.portfolio')
    @include('partials.front.home.service')
    @include('partials.front.home.testimonials')
    @include('partials.front.contact')
    @include('partials.front.home.team')

@endsection
