<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Europe 5GB',
                'country' => 'Germany',
                'country_code' => 'DE',
                'data_amount' => 5,
                'price' => 9.99,
                'currency' => 'EUR',
                'validity_days' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Europe 10GB',
                'country' => 'France',
                'country_code' => 'FR',
                'data_amount' => 10,
                'price' => 14.99,
                'currency' => 'EUR',
                'validity_days' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Asia 3GB',
                'country' => 'Japan',
                'country_code' => 'JP',
                'data_amount' => 3,
                'price' => 7.99,
                'currency' => 'EUR',
                'validity_days' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'USA 10GB',
                'country' => 'United States',
                'country_code' => 'US',
                'data_amount' => 10,
                'price' => 19.99,
                'currency' => 'EUR',
                'validity_days' => 30,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
