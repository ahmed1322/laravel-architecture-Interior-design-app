@extends('layouts.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-lg-8 mx-auto mt-5" id="action_msg">
        @include('inc.error_msg')
        @include('inc.success_msg')
    </div>

    <div class="col-lg-10 mx-auto">

        <div class="row">
            <div class="col-lg-12">
                @include('partials.backend.search')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" id="api_url" data-api_url="{{route('api-category.index')}}">
                        <h3 class="header-title mt-0 mb-3">Categories</h3>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Posts Count</th>
                                        <th scope="col">Visiblity</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="api-data"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{-- {{ $categories->appends(['search' => request()->query('search')])->links('partials.backend.pagination') }} --}}
                <nav aria-label="...">
                    <ul class="pagination" id='api-pagination'></ul>
                </nav>
            </div>

        </div>
    </div>

    <div id="modal_parent"></div>
@endsection

@section('script')
    <script src="{{ asset('js/Api-Categories.js') }}"></script>
@endsection
