<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            'name'=>'hassan',
            'email'=>'hassaneit8@gmail.com',
            'role'=>'admin',
            'password'=>Hash::make('123456789')
        ]);
    }
}
