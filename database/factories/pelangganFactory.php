<?php

namespace Database\Factories;

use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class pelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model= pelanggan::class;
   

    public function definition()
    {
        return [ 
            //
           
            'nama'=>fake()->name(),
            'jenis_kelamin'=>fake()->randomElement(['Pria','Wanita']),
            'telpon'=>fake()->phoneNumber(),
            'alamat'=>fake()->address()
        ];
    }
}
