<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function view()
    {
        $userData = User::get();
        $users = $userData->where('id');
        $permissionFileds = permission::select('id','name')->with('users')->get();
        return view('auth.super-admin', compact('users','permissionFileds'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
