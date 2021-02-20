<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Dashboard\Roles\CreateRolesRequest;
use App\Http\Requests\Dashboard\Roles\UpdateRolesRequest;
class UsersRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'dashboard.dsb-role.index', [ 'roles' => Role::search('name')->doPaginate() ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard.dsb-role.cuRole' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolesRequest $request)
    {
        $post_roles        = isset($request->post_roles) ? $request->post_roles : [];
        $category_roles    = isset($request->category_roles) ? $request->category_roles : [];
        $tag_roles         = isset($request->tag_roles) ? $request->tag_roles : [];

        $role = Role::create([
            'name'              => $request->name,
            'post_roles'        => serialize($post_roles),
            'category_roles'    => serialize($category_roles),
            'tag_roles'         => serialize($tag_roles),
        ]);

        session()->flash('action', 'Role '.$role->name.' added Successfully' );

        return redirect(route('role.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->post_roles = unserialize($role->post_roles);
        $role->category_roles = unserialize($role->category_roles);
        $role->tag_roles = unserialize($role->tag_roles);
        return view( 'dashboard.dsb-role.cuRole', [ 'role' => $role ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $data = $request->validated();

        // Serialize Roles
        $post_roles        = isset($data['post_roles']) ? $data['post_roles'] : [];
        $category_roles    = isset($data['category_roles']) ? $data['category_roles'] : [];
        $tag_roles         = isset($data['tag_roles']) ? $data['tag_roles'] : [];

        $role->update([
            'name'              => $data['name'],
            'post_roles'        => serialize($post_roles),
            'category_roles'    => serialize($category_roles),
            'tag_roles'         => serialize($tag_roles),
        ]);

        session()->flash('action', 'Role '.$role->name.' Updated Successfully' );

        return redirect( route( 'role.index' ) );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // dd( $role->users->count() );
        if( $role->users->count() > 0 ){
            session()->flash('action', 'Cant not Delete Role '.$role->name.', it has users appended' );
            return redirect( route( 'role.index' ) )->with([ 'roles' => Role::paginate(5) ]);
        }

        $role->delete();

        session()->flash('action', 'Role '.$role->name.' Deleted Successfully' );

    }
}
