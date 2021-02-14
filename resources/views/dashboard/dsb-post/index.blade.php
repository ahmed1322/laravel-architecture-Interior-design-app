@extends('layouts.dashboard')
@section('dashboard')

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.error_msg')
    </div>

    <div class="col-lg-8 mx-auto mt-5">
        @include('inc.success_msg')
    </div>

    <div class="col-lg-10 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                @include('partials.backend.search')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" id="api_url" data-api_url="{{route('post.index')}}">
                        <h3 class="header-title mt-0 mb-3">Posts</h3>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        @if(auth()->user()->status)
                                            <th scope="col">Author</th>
                                        @endif
                                        <th scope="col">Tags</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="api-data"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <nav aria-label="...">
                    <ul class="pagination" id='api-pagination'></ul>
                </nav>
            </div>

        </div>
    </div>
    <div id="modal_parent"></div>
@endsection
@section('script')
    <script src="{{ asset('js/Api-Posts.js') }}"></script>
@endsection
