<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //fetch outlet IDs from the Outlet model
        $outletIds = \App\Models\Outlet::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'total' => $this->faker->randomFloat(2, 20, 500),
            'outlet_id' => $this->faker->randomElement($outletIds),
        ];
    }
}
