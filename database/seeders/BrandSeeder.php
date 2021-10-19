<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Seiko'
        ]);

        Brand::create([
            'name' => 'Frederique Constant'
        ]);

        Brand::create([
            'name' => 'Tissot'
        ]);

        Brand::create([
            'name' => 'Lip'
        ]);

    }
}
