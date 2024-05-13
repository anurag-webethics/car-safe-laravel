<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchData(Request $request)
    {
        $countries =  Country::get()->take(20);
        return view('auth.search', ['countries'=> $countries]);
    }

    public function search(Request $request)
    {
        $users = DB::table('users')->where('role_id', '!=', '1');
        $query = $users->join('countries', 'users.country_id', '=', 'countries.id')
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

            $email = $request->email;
            $gender = $request->gender;
            $country = $request->country;
            $hobbies = $request->hobbies;

            if ($email) {
                $data = array_filter($data, function ($val) use ($email) {
                    if (str_contains($val->email, $email)) {
                        return $val;
                    }
                });
            }

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
}
