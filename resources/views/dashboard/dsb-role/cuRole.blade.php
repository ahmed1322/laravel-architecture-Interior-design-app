@extends('layouts.dashboard')
@section('dashboard')

<div class="row mt-5 mb-5">

    <div class="col-lg-8 mx-auto">
        <form method="POST" action="{{ isset( $role ) ? route('role.update', $role->id) : route('role.store')}}" class="form-horizontal mb-5">
            @csrf
            @isset($role)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="name">Role Name</label>
                <input 
                    value="{{ isset( $role ) ? ( old('name') ? old('name') : $role->name ) : old('name') }}"
                    type="text"
                    id="name"
                    name="name"
                    class="form-control form-control-lg @error('name') is-invalid @enderror" 
                    placeholder="e.g admin" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @isset($role)
                    <input type="hidden" name="old_name" value="{{ $role->name }}">
                @endisset
            </div>

            <div class="from-group">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#posts" role="tab" aria-controls="pills-activity" aria-selected="false">
                                    Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#categories" role="tab" aria-controls="pills-messages" aria-selected="false">
                                    Categories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#tags" role="tab" aria-controls="pills-projects" aria-selected="false">
                                    Tags
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show p-3" id="posts" role="tabpanel" aria-labelledby="posts">
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->post_roles['c']) && $role->post_roles['c']) checked @endif name="post_roles[c]" value="1" class="custom-control-input" id="create_post">
                                    <label class="custom-control-label" for="create_post">Allow Create Posts</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->post_roles['r']) && $role->post_roles['r']) checked @endif name="post_roles[r]" value="1" class="custom-control-input" id="read_post">
                                    <label class="custom-control-label" for="read_post">Allow Read Posts</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->post_roles['u']) && $role->post_roles['u']) checked @endif name="post_roles[u]" value="1" class="custom-control-input" id="update_post">
                                    <label class="custom-control-label" for="update_post">Allow Update Posts</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->post_roles['d']) && $role->post_roles['d']) checked @endif name="post_roles[d]" value="1" class="custom-control-input" id="delete_post">
                                    <label class="custom-control-label" for="delete_post">Allow Delete Posts</label>
                                </div>
                            </div>

                            <div class="tab-pane fade p-3" id="categories" role="tabpanel" aria-labelledby="categories">
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->category_roles['c']) && $role->category_roles['c']) checked @endif name="category_roles[c]" value="1" class="custom-control-input" id="create_category">
                                    <label class="custom-control-label" for="create_category">Allow Create categories</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->category_roles['r']) && $role->category_roles['r']) checked @endif name="category_roles[r]" value="1" class="custom-control-input" id="read_category">
                                    <label class="custom-control-label" for="read_category">Allow Read categories</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->category_roles['u']) && $role->category_roles['u']) checked @endif name="category_roles[u]" value="1" class="custom-control-input" id="update_category">
                                    <label class="custom-control-label" for="update_category">Allow Update categories</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->category_roles['d']) && $role->category_roles['d']) checked @endif name="category_roles[d]" value="1" class="custom-control-input" id="delete_category">
                                    <label class="custom-control-label" for="delete_category">Allow Delete categories</label>
                                </div>
                            </div>

                            <div class="tab-pane fade p-3" id="tags" role="tabpanel" aria-labelledby="tags">
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->tag_roles['c']) && $role->tag_roles['c']) checked @endif name="tag_roles[c]" value="1" class="custom-control-input" id="create_tag">
                                    <label class="custom-control-label" for="create_tag">Allow Create Tags</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->tag_roles['r']) && $role->tag_roles['r']) checked @endif name="tag_roles[r]" value="1" class="custom-control-input" id="read_tag">
                                    <label class="custom-control-label" for="read_tag">Allow Read Tags</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->tag_roles['u']) && $role->tag_roles['u']) checked @endif name="tag_roles[u]" value="1" class="custom-control-input" id="update_tag">
                                    <label class="custom-control-label" for="update_tag">Allow Update Tags</label>
                                </div>
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" @if(isset($role->tag_roles['d']) && $role->tag_roles['d']) checked @endif name="tag_roles[d]" value="1" class="custom-control-input" id="delete_tag">
                                    <label class="custom-control-label" for="delete_tag">Allow Delete Tags</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>
    
@endsection