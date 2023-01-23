<?php

namespace Database\Factories;
use App\Models\produk;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produk>
 */
class produkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model=produk::class;
    public function definition()
    {
        return [
            //
            'kode_produk'=>fake()->randomDigit(),
            'nama_produk'=>fake()->randomElement([
                'Mangga',
                'Anggur',
                'Pisang',
                'Rambutan',
                'Pepaya']),
            'harga'=>fake()->numberBetween($min=5000, $max=40000),
            'stok'=>fake()->randomDigit(),
            'satuan'=>fake()->randomDigit(),
            'supplier_id'=>fake()->randomElement([1,2,3,4])
        ];
    }
}
