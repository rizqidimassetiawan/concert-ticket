<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitors>
 */
class VisitorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'no_ticket' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'band_id' => mt_rand(1,5),
            'event_time' => date(now()),
            'province_id' => 11,
            'regency_id' => 1102,
            'district_id' => 1102011,
            'village_id' => 1102011002,
            'religion' => $this->faker->randomElement(['Islam','Kristen','Hindu','Budha','Katolik','Konghucu']),
            'gender' => $this->faker->randomElement(['Pria','Wanita']),
            'class' => $this->faker->randomElement(['VIP','Bisnis','ekonomi']),
            'date_birth' => date(now()),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}