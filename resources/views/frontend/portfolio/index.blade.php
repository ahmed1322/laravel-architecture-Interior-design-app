@extends('layouts.front')
@section('content')
@include( 'partials.front.inner_pages_banner' )
@include('partials.front.portfolio' , [ 'add_filtration' => $add_filtration ?? false ])
@endsection
