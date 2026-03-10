<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

  public function definition()
    {
        // 1. Primero definimos la variable (con un signo de igual normal =)
        $name = fake()->sentence(2); 

        // 2. Luego retornamos el arreglo con los datos
        return [
            'name'        => $name,
            'slug'        => \Illuminate\Support\Str::slug($name), 
            'description' => fake()->paragraph(),
        ];
    }
}