<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\User::where('email', 'admin@gmail.com')->first())
            return;

        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => \App\Enums\UserTypes::SUPERADMIN,
            'status' => 1,
            'password' => bcrypt("Password@1"),
        ]);
    }
}
