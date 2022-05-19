<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $table->string('name');
        // $table->text('description');
        // $table->string('slug');
        // $table->integer('price');
        // $table->boolean('active');

        $name = $this->faker->sentence();

        return [
            'name' => $name,
            'description' => $this->faker->sentences(rand(2, 5), true),
            'image' => $this->faker->imageUrl(),
            'slug' => Str::slug($name),
            'price' => rand(500, 10000),
            'active' => $this->faker->boolean(80)
        ];
    }
}
