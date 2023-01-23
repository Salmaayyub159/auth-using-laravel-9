<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\pelanggan;
use App\Models\produk;
use Exception;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class playDB extends Controller
{
    //

    public function showAll()
    {
      $data= penjualan::with('pelanggan')->get();
      return $data;
        
    }

    public function showId($id){
      $data=penjualan::with('pelanggan')->find($id);
      return $data;
    }

    public function produkData()
    {
      $data=produk::with('supplier')->get();
      return $data;
    }

    public function addProduk(Request $request)
    {
    

       $dataCek= Validator::make($request->all(),[
        'nama_produk'=>'required |unique:App\Models\produk,nama_produk',
        'kode_produk'=>'required |unique:App\Models\produk,kode_produk',
        'harga'=>'required|numeric',
        'stok'=>'required | numeric',
        'satuan'=>'required|numeric',
        

       ],$message=[
        'required'=>'Data belum dilengkapi',
        'numeric'=>'Format data harus angka!',
        'unique:App\Models\produk,kode_produk'=>'Kode yang Anda masukkan sudah terdaftar, silahkan masukkan kode yang lain!',
        'unique:App\Models\produk,nama_produk'=>'Nama produk sudah tersedia, masukkan nama yang lain'
       ]);

       if ($dataCek->fails())
       {
         return $dataCek->errors();
       }else{

        $produk= new Produk;
        $produk->kode_produk=$request->kode_produk;
        $produk->nama_produk=$request->nama_produk;
        $produk->harga=$request->satuan;
        $produk->stok=$request->stok;
        $produk->satuan=$request->satuan;
        $produk->supplier_id=$request->supplier_id;
        $produk->save();
        
        return 'Data berhasil ditambahkan';

       }

    }

    public function editProduk(Request $request,$id){

      
      try{

        $data= produk::find($id);
        $data->nama_produk=$request->nama_produk;
        $data->harga=$request->harga;
        $data->stok=$request->stok;
        $data->satuan=$request->satuan;
        $data->save();


      }
      catch(Exception $e){

        return $e;

      }

     return 'Berhasil diubah';

    }

    public function deleteProduk($id)
    {
          $data=produk::find($id);
         $hapus= $data->delete();
          return $hapus;
    }
}
