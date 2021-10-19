<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::create([
            'title' => 'TEST',
            'brand_id' => 1,
            'company_id' => 1,
            'model' => 'test',
            'reference' => 'test',
        ]);
        Offer::factory(14)->create();
    }
}
