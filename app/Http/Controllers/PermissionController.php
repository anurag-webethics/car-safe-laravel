<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();

        foreach ($permissions as $permission) {
            foreach ($permission->users as $user) {
                return $user->permission_id;
            }
        }
    }
}
