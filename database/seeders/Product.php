<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Product');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('Products')->insert([
                'description' => $faker->sentence(),
                'Colour' => $faker->sentence(),
                'Category' => $faker->sentence(),
                'Size' => $faker->randomDigit(),
                'Price' => $faker->randomDigit(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'image' => 'https://source.unsplash.com/random',
            ]);
        }
    }
}
