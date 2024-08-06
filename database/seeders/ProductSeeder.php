<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

       for( $i = 0; $i < 10; $i++ ){
           DB::table('products')->insert([
               'name' => $faker->text(10),
               'image' => 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1582710303/431942_02JP0_9064_001_098_0000_Light-Womens-Ace-trainer-with-bee.jpg',
               'price' =>  $faker->numberBetween(500000,1000000),
               'content' => $faker->text(30),
               'category_id'=> rand(1,4)
           ]);
       }
   }
}
