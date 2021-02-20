@extends('layouts.dashboard')

@section('dashboard')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 offset-md-6 mt-5">
                @include('partials.backend.search')
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 mx-auto mt-5">
            @if(session('action'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('action') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>

        <div class="col-md-12 mx-auto mt-3">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-success text-uppercase font-size-12 mb-2">Role: {{ isset( $user->role->name ) ? $user->role->name : 'unsinged yet' }}</p>
                                <h5><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                            </div>
                            <div class="card-body border-top">
                                <div class="row align-items-center">
                                    <div class="col-sm-auto">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-2">
                                                <a
                                                    href="#"
                                                    class="text-muted d-inline-block"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title=""
                                                    data-original-title="Created at"> <i class="uil uil-calender mr-1"></i> {{ $user->created_at->diffForHumans() }} </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="dropdown align-self-center float-right">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @foreach($roles as $id => $name)
                                            @if($user->role_id !== $id )
                                                <form method="post" action="{{ route('user.addRole', ['user' => $user->id, 'role' => $id ]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <button class="dropdown-item text-success"><i class="uil uil-edit-alt mr-2"></i>Make {{ $name }}</button>
                                                </form>
                                            @endif
                                        @endforeach
                                        <!-- item-->
                                        <!-- item-->
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <form action="{{ route('user.remove.role', [ 'user' => $user->id, 'role' => $user->role_id ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete Role</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
            </div>
            <h1>No Roles Added Yet</h1>
            @endforelse
            {{ $users->links( 'partials.backend.pagination' ) }}
        </div>

    </div>
</div>
@endsection
