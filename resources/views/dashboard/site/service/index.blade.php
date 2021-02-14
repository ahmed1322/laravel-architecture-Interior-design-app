@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
@endsection
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
                <a class="btn btn-success" href="{{ route('service.create') }}">Add New Service</a>
                <form class="d-inline-block" action="{{ route('service.destroyAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete All Services</button>
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
                                        <th scope="col">Icon</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($services as $service)

                                        <tr>
                                            <th><span class="{{ $service->icon }}"></span></th>
                                            <th>{{ $service->title }}</th>
                                            <th>{{ substr_replace($service->excerpt, '...', 50, -1) }}</th>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('service.edit', $service->id) }}" class="btn btn-sm btn-success mr-2">Update</a>
                                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST">
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
            </div>

        </div>
    </div>
@endsection
