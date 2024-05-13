<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperAdminRequest;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class SuperAdminController extends Controller
{

    public function view()
    {
        $users = User::where('role_id', '!=', '1')->get();
        $permissionFileds = Permission::select('id', 'name')->get();
        $roles = Role::where('id', '!=', '1')->get();
        return view('super-admin.super-admin', ['users' => $users, 'roles' => $roles, 'permissionFileds' => $permissionFileds]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SuperAdminRequest $request)
    {
        try {
            dd($request->all());
            $message = '';
            if ($request->has('createPermission')) {
                $permission = new Permission();
                $permission->name = $request->addPermission;
                $permission->save();
                $message = 'Permission created successfully';
            } else {
                $role = new Role();
                $role->name = $request->role;
                $role->save();
                $permissionsIds = $request->permissions;
                $role->permission()->sync($permissionsIds);
                $message = 'Role created successfully';
            }
            return redirect('/super-admin')->with('success', $message);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function editUser($id)
    {
        $users = User::find($id);
        $rolesPremissions = Role::find($users->role_id)->permission;
        $chkFields = [];
        foreach ($rolesPremissions as $key => $value) {
            $chkFields[$value->id] = $value->name;
        }
        $roles = Role::where('id', '!=', '1')->get();
        $permissionFileds = Permission::select('id', 'name')->get();
        return view('super-admin.edit',  ['users' => $users, 'roles' => $roles, 'permissionFileds' => $permissionFileds, 'chkFields' => $chkFields]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->userole;
        Role::find($request->userole)->permission()->sync($request->permissions);
        $user->save();
        return redirect('/super-admin');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return redirect('/super-admin');
    }
}
