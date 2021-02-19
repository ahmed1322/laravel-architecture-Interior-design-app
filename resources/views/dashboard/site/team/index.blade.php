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
                <a class="btn btn-success" href="{{ route('team.create') }}">Add New Team Member</a>
                <form class="d-inline-block" action="{{ route('team.destroyAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete All Team Members</button>
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
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">name</th>
                                        <th scope="col">role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($teams as $team)

                                        <tr>
                                            <th><img height="100" width="100" class="img-thumbnail rounded img-fluid" src="{{ asset( 'storage/' . $team->image ) }}" alt="{{ $team->name }}"></th>
                                            <th>{{ $team->name }}</th>
                                            <th>{{ $team->role }}</th>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('team.edit', $team->id) }}" class="btn btn-sm btn-success mr-2">Update</a>
                                                    <form action="{{ route('team.destroy', $team->id) }}" method="POST">
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
                {{ $teams->links( 'partials.backend.pagination' ) }}
            </div>

        </div>
    </div>
@endsection
