<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\UserController::factory(10)->create();
        (new CompanySeeder)->run();
        (new UserSeeder)->run();
        (new BrandSeeder)->run();
        (new OfferSeeder)->run();
    }
}
