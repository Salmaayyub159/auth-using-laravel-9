<?php

namespace Database\Factories;

use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\supplier>
 */
class supplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= supplier::class;
    public function definition()
    {
        return [
            //

            'nama'=>fake()->name(),
            'telpon'=>fake()->phoneNumber(),
            'alamat'=>fake()->address()
        ];
    }
}
