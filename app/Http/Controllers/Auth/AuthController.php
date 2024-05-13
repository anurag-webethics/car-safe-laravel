<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use App\Models\Country;
use Flasher\Laravel\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Support\Arr;
use App\Models\Role;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = Arr::only($request->all(), ['email', 'password']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid email.',
        ])->onlyInput('email');
    }

    public function showRegistration()
    {
        $countries =  Country::get()->take(20);
        return view('auth.registration', ['countries' => $countries]);
    }

    public function registration(UserRegistration $request)
    {
        $user = new User;
        $user->name = $request->firstName . ' ' . $request->lastName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->country_id = $request->country;
        $user->gender = $request->gender;
        $user->hobbies = $request->hobbies;
        $user->save();
        return redirect('/login')->with('success', 'Registration Successfully Done');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function profileEdit()
    {
        return view('auth.profile-edit');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function redirect()
    {
        session()->forget('type');
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {

            $google_user = Socialite::driver('google')->user();
            $user = User::Where('google_id', $google_user->getId())->first();

            if (session()->get('type') == 'login') {
                if (!$user) {
                    return redirect('registration')->with('error', 'Register your account');
                }
            }

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);

                return redirect('profile');
            } else {
                Auth::login($user);
                return redirect('profile');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong!' . $th->getMessage());
        }
    }

    public function redirectLogin()
    {
        session()->put('type', 'login');
        return Socialite::driver('google')->redirect();
    }

    public function showAdmin()
    {
        $currentUserRoleId = Auth::user()->role_id;
        $rolesPremissions = Role::find($currentUserRoleId);
        $accessibleFields = [];
        foreach ($rolesPremissions->permission as $accessFields) {
            if ($accessFields->name == 'Country') {
                $accessibleFields['country_id'] = 'Country';
                continue;
            }
            $accessibleFields[lcfirst($accessFields->name)] = $accessFields->name;
        }
        if ($currentUserRoleId > 1) {
            $users = User::where('role_id', '!=', '1')->select(array_keys($accessibleFields))->get();
        } else {
            $users = User::where('role_id', '!=', '1')->get();
        }

        $countries =  Country::get()->take(20);
        return view('auth.admin', ['users' => $users, 'countries' => $countries, 'accessibleFields' => $accessibleFields]);
    }
}
