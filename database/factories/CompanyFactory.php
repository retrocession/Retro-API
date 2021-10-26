<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Bijouterie ' . $this->faker->name,
            'address' => $this->faker->address,
            'code_ape' => '3212Z',
            'subscription' => 0,
            'ape_verified_at' => now(),
        ];
    }
}
