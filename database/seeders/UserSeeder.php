<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Anurag Thakur';
        $user->email = 'anuragthkur123@gmail.com';
        $user->password = Hash::make('12345678');
        $user->gender = 'male';
        $user->role = 1;
        $user->save();
    }
}
