<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'Admin';
        $user->last_name = 'admin';
        $user->email = 'admin@test.com';
        $user->password = Hash::make('P@ssw0rd');
        $user->role = 'on';

        $user->save();

    }
}
