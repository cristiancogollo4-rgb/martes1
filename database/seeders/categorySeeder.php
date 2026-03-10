<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{

    public function run()
    {
        category::firstOrCreate(
            ['slug' => 'tecnologia'],
            [
                'name' => 'Tecnología',
                'description' => 'Todos lo relacionado con la tecnología'
            ]
        );
    }
}
