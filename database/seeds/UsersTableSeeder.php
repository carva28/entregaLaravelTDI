<?php

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
        //
        \App\User::create([
           'name' => 'Administrator',
           'username' => 'admintdi',
           'email' => 'admin@tdi.pt',
           'password' => Hash::make('admin123'),
           'role_id' => 1,
        ]);

        \App\User::create([
            'name' => 'Editor Joao',
            'username' => 'editortdi',
            'email' => 'editor@tdi.pt',
            'password' => Hash::make('editor123'),
            'role_id' => 2,
        ]);

        factory('App\User', 20)->create();
    }
}
