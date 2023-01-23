<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pelanggan;

class penjualan extends Model
{
    use HasFactory;
    protected $table='penjualan';

    protected $fillable=[
        'tanggal',
        'keterangan',
        'total',
    ];


    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class);
    }
}
