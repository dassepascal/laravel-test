<?php

namespace Database\Seeders;


use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('fr,FR');

        for($i = 0; $i < 10; $i++) {
            \App\Models\Property::create([
                'title' => $faker->word,
                'description' => $faker->sentence,
                'surface' => $faker->numberBetween(50, 200),
                'rooms' => $faker->numberBetween(1, 10),
                'bedrooms' => $faker->numberBetween(1, 10),
                'floor' => $faker->numberBetween(1, 10),
                'city' => $faker->city,
                'postal_code' => $faker->numberBetween($min = 10000, $max = 90000),
                'address' => $faker->address,
                'price' => $faker->numberBetween(1000, 10000),
                'sold' => $faker->boolean(),

            ]);
        }
    }
}
