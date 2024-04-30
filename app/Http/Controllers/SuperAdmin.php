<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function view()
    {
        $userData = User::where('role_id', '!=', '1')->get();
        $users = $userData->where('id');
        $permissionFileds = permission::select('id', 'name')->get();
        $roles = Role::where('id', '!=', '1')->get();
        // dd($roles->toArray());
        return view('super-admin.super-admin', compact('users', 'roles', 'permissionFileds'));
    }

    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $message = '';
            if ($request->has('createPermission')) {
                $permission = new permission();
                $permission->name = $request->addPermission;
                $permission->save();
                $message = 'Permission created successfully';
            } else {
                $role = new Role();
                $role->name = $request->role;
                $role->save();
                $permissionsIds = $request->permissions;
                $role->permissions()->sync($permissionsIds);
                $message = 'Role created successfully';
            }
            return redirect('/super-admin')->with('success', $message);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function editUser($id)
    {
        $users = User::find($id);
        $rolesPremissions = Role::find($users->role_id)->permissions;
        $chkFields = [];
        foreach ($rolesPremissions as $key => $value) {
            $chkFields[$value->id] = $value->name;
        }
        $roles = Role::where('id', '!=', '1')->get();
        $permissionFileds = permission::select('id', 'name')->get();
        return view('super-admin.edit', compact('users', 'roles', 'permissionFileds', 'chkFields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->permissions);
        $user = User::findOrFail($id);
        $user->role_id = $request->userole;
        Role::find($request->userole)->permissions()->sync($request->permissions);
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
