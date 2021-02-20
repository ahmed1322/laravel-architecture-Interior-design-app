<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\SubAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'dashboard.dsb-user.index', [
            'users' => User::search('name')->doPaginate(20),
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Sign user role
     *
     * @return \Illuminate\Http\Response
     */
    // public function addRole(User $user, Role $role)
    public function addRole(User $user, Role $role)
    {
        $user->update([
            'role_id' => $role->id
        ]);

        session()->flash('action', 'User Role Updated Successfully' );

        return redirect( route( 'user.index' ) )->with( [
            'users' => User::paginate(5),
            'roles' => Role::all()
        ]);
    }


    /**
     * Display a listing of the Admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminsOnly(Admin $admin)
    {
        return view( 'dashboard.dsb-user.index', [
            'users' => Admin::admins()->paginate(5),
            'roles' => Role::all()
        ]);
    }

    /**
     * Display a listing of the Admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubAdminsOnly(Admin $admin)
    {
        return view( 'dashboard.dsb-user.index', [
            'users' => SubAdmin::subAdmins()->paginate(5),
            'roles' => Role::all()
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(User $user, Role $role)
    {
        $user->update([
            'role_id' => -1
        ]);

        session()->flash('action', 'User Role Updated Successfully' );

        return redirect( route( 'user.index' ) );


    }
}
