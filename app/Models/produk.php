<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\supplier;

class produk extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table='produk';

    protected $fillable=[
        'kode_produk',
        'nama_produk',
        'harga',
        'stok',
        'satuan',
       ];


    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
}
