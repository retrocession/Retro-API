<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'last_name' => 'Test',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('_admin'),
            'company_id' => 1,
            'remember_token' => Str::random(10),
            'is_admin' => 4
        ]);

        User::factory(15)->create();
    }
}
