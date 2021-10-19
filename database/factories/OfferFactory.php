<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brands = Brand::pluck('id')->toArray();
        $company = Company::pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence,
            'brand_id' => $this->faker->randomElement($brands),
            'company_id' => $this->faker->randomElement($company),
            'model' => $this->faker->word,
            'reference' => $this->faker->randomElement(),
        ];
    }
}
