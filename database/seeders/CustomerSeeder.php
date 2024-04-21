<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Customer::create([
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'username' => $faker->name,
                'password' => Hash::make($faker->password),


            ]);
        }
    }
}
