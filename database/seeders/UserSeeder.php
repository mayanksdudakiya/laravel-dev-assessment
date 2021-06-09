<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        $user = User::create([
            'name' => 'Mayank Dudakiya',
            'user_name' => 'mayank.dudakiya',
            'email' => 'mayanksdudakiya@gmail.com',
            'user_role' => config('settings.roles.admin'),
            'password' => config('settings.password.admin'),
        ]);
    }
}
