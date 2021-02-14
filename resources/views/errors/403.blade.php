@extends('layouts.errors')
@section('error')
<div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        <div class="account-pages my-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-8">
                                <div class="text-center">

                                    <div>
                                        <img src="assets/images/not-found.png" alt="" class="img-fluid" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="mt-3">You couldn’t Access this Page</h3>
                                <a href="{{ route('home') }}" class="btn btn-lg btn-primary mt-4">Back to Home</a>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
            </div>
        </div>
    </div>
@endsection
