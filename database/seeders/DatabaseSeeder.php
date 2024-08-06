<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);
}
}
// $table->string('name');
// $table->string('image');
// $table->double('price');
// $table->string('content');
// $table->unsignedBigInteger('category_id');
