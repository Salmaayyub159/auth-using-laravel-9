<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produk;

class supplier extends Model
{
    use HasFactory;

    protected $table='supplier';

    protected $fillable=[
            'nama',
            'telpon',
            'alamat',
    ];


    public function produk()
    {
        return $this->hasMany(produk::class);
    }
}
