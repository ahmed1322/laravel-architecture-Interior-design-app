@extends('layouts.front')
@section('content')
@include( 'partials.front.inner_pages_banner', [ 'breadcrubm' => 'portfolios' ] )
@include('partials.front.portfolio' , [ 'add_filtration' => $add_filtration ?? false ])
@endsection
