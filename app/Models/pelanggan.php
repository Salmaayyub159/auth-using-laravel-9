<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Administration\pelangganFactory;
use Database\Factories\pelangganFactory as FactoriesPelangganFactory;
use App\Models\penjualan;

class pelanggan extends Model
{
    use HasFactory;  
    protected $table='pelanggan';
    protected $fillable=[
        
        'nama',
        'alamat',
        'telpon',
        'alamat',
        'jenis_kelamin'
    ];

    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }

   
}
