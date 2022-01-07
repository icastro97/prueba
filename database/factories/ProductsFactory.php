<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

class ProductsFactory extends Factory
{
    protected $model = Products::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->title,
            'precio' => $this->faker->randomDigit,
            'variaciones' => $this->faker->text,
            'categoria' => $this->faker->text
        ];
    }
}
