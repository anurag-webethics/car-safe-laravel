<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use App\Models\Country;
use Flasher\Laravel\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Log;
use App\Models\Role;

class AuthController extends Controller
{
    public $country;

    public function __construct()
    {
        $this->country = Country::get()->take(20);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

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
        $countries =  $this->country;
        return view('auth.registration', compact('countries'));
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

    public function searchData(Request $request)
    {
        $countries =  $this->country;
        return view('auth.search', compact('countries'));
    }

    public function search(Request $request)
    {
        $users = DB::table('users');
        $query = $users->join('countries', 'users.country_id', '=', 'countries.id')
            // ->join('role', 'users.role_id', '=', 'role.id')
            // ->join('permission_user', 'users.id', '=', 'permission_user.user_id')
            ->select('users.*', 'countries.country');

        $data = $query->where('users.name', 'like', '%' .  $request->search . '%');
        if ($request->ajax()) {
            $data = $query->get()->toArray();

            // $gender = $request->gender;
            // $country = $request->country;
            // $hobbies = $request->hobbies;

            // $data = array_filter($data, function ($val) use ($gender, $country, $hobbies) {
            //     if (($gender && $val->gender != $gender) ||
            //         ($country && $val->country_id != $country) ||
            //         ($hobbies && !array_intersect($hobbies, json_decode($val->hobbies)))
            //     ) {
            //         return false;
            //     }
            //     return true;
            // });

            $gender = $request->gender;
            $country = $request->country;
            $hobbies = $request->hobbies;


            if ($gender) {
                $data = array_filter($data, function ($val) use ($gender) {
                    if ($val->gender == $gender) {
                        return $val;
                    }
                });
            }

            if ($country) {
                $data = array_filter($data, function ($val) use ($country) {
                    if ($val->country_id == $country) {
                        return $val;
                    }
                });
            }

            if ($hobbies) {
                $data = array_filter($data, function ($val) use ($hobbies) {
                    $hobby = json_decode($val->hobbies);
                    if (array_intersect($hobbies, $hobby)) {
                        return $val;
                    }
                });
            }

            return json_encode([
                'data' => $data,
                'status' => true,
                'msg' => 'data fetch successfull'
            ], 200);
        }
    }

    public function showAdmin()
    {
        $currentUserRoleId = Auth::user()->role_id;
        $rolesPremissions = Role::find($currentUserRoleId);
        $accessibleFields = [];
        foreach ($rolesPremissions->permissions as $accessFields) {
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

        $countries =  $this->country;
        return view('auth.admin', compact('users', 'countries', 'accessibleFields'));
    }
}
