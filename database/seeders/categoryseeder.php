<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologia = new Category();
        $tecnologia->name = 'Tecnología';
        $tecnologia->description = "todo lo relacionado";
        $tecnologia->save();
    }
}
