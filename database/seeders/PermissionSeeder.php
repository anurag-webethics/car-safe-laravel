<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionName = [
            ['name'=>'name'],
            ['name'=>'email'],
            ['name'=>'country'],
            ['name'=>'hobbies'],
        ];

        foreach($permissionName as $key=>$value){
            $user = new permission();
            $user->name = $value['name'];
            $user->save();
        }

    }
}
