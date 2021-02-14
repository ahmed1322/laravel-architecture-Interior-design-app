@extends('layouts.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
    </div>

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.success_msg')
    </div>
</div>
    
@endsection