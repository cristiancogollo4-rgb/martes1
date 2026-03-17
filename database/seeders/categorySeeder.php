<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{

    public function run()
    {
        Category::firstOrCreate(
            ['slug' => 'tecnologia'],
            [
                'name' => 'Tecnología',
                'description' => 'Todos lo relacionado con la tecnología'
            ]
        );
    }
}
