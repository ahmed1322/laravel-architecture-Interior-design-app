@extends('layouts.front')

@section('content')
    @include( 'partials.front.inner_pages_banner'  , [ 'breadcrubm' => 'contact' ] )
    @include('partials.front.contact')
@endsection
