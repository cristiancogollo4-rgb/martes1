<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use App\Models\product;
use Illuminate\Database\Seeder;
use PDO;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(categoryseeder::class);
      Category::factory(100)->create();
      Product::factory(200)->create();

    }
}
