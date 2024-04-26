<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $userDetail;
    public $countries;

    public function __construct()
    {
        $this->userDetail = Auth::user();
        $this->countries = Country::get()->take(20);
    }

    public function index()
    {
        return view('auth.profile', ['userDetail' => $this->userDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('auth.profile-edit', [
            'userDetail' => $this->userDetail,
            'countries' => $this->countries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userDetail = User::find($id);
        $userDetail->name = $request->firstName . ' ' . $request->lastName;
        $userDetail->country_id = $request->country;
        $userDetail->gender = $request->gender;
        $userDetail->hobbies = $request->hobbies;
        $file = $request->file('profileImg');
        if (!empty($file)) {
            $filePath = $file->store('profileimage', 'public');
            $userDetail->profile_img = $filePath;
        }
        $userDetail->save();
        return redirect('profile')->with('success', 'Profile is updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function permission()
    {
        // $currentAdmingId = $id
        $userData = User::find(2);
        $filedsName = [];
        foreach ($userData->permission as $fieldName) {
            array_push($filedsName, $fieldName->name);
        }
        echo '<Pre>';
        print_r($filedsName);
        die();
        // return $filedsName;
    }
}
