<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {




               $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Product::create([
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->numberBetween(1000, 5000),
                'quantity' => $faker->numberBetween(1, 20),
                'image' => $faker->text,


            ]);
        }
    }
}


