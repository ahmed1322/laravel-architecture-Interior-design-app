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
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('portfolio.create') }}">Add New Portfolio</a>
                <form class="d-inline-block" action="{{ route('portfolio.destroyAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete All Portfolios</button>
                </form>
            </div>

            <div class="col-lg-6">
                @include('partials.backend.search')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($portfolios as $portfolio)

                                        <tr>
                                            <th>{{ substr_replace($portfolio->title, '...', 350, -1)  }}</th>
                                            <th>{{ substr_replace($portfolio->description, '...', 50, -1) }}</th>
                                            <td>{{ $portfolio->category->name }}</td>
                                            <td>{{ $portfolio->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-success mr-2">Update</a>
                                                    <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{ $portfolios->links( 'partials.backend.pagination' ) }}
            </div>

        </div>
    </div>
@endsection
