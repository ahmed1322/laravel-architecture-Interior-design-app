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
                <a class="btn btn-success" href="{{ route('slider.create') }}">Add New Slider</a>
                <form class="d-inline-block" action="{{ route('slider.destroyAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete All Slider</button>
                </form>
            </div>

            <div class="col-lg-6">
                @include('partials.backend.search')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" id="api_url" data-api_url="{{route('post.index')}}">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Portfolio</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($sliders as $slider)

                                        <tr>
                                            <th>{{ $slider->visible ? 'active' : 'Not Active' }}</th>
                                            <th>{{ substr_replace($slider->title, '...', 350, -1)  }}</th>
                                            <th>{{ substr_replace($slider->description, '...', 50, -1) }}</th>
                                            <td>{{ $slider->category->name }}</td>
                                            <td>{{ $slider->portfolio->title }}</td>
                                            <td>{{ $slider->created_at->format('d F Y') }}</td>

                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-success mr-2">Update</a>
                                                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>

                                                {{-- <a class="btn btn-danger" href="{{ route('tag.destroy', $tag->id) }}">Delete</a> --}}
                                            </td>
                                        </tr>
                                        @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                {{ $sliders->links('partials.backend.pagination') }}
            </div>

        </div>
    </div>
@endsection
