<?php

namespace Database\Factories;

use App\Models\penjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\penjualan>
 */
class penjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model= penjualan::class;
    public function definition()
    {
        return [
            //
            'tanggal'=>fake()->date(),
            'keterangan'=>fake()->text(),
            'total'=>fake()->randomElement([200000,100000,390000,320000,12000]),
            'pelanggan_id'=>fake()->randomDigit(),
        ];
    }
}
