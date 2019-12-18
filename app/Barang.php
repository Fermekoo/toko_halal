<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table        = 'barang';
    protected $primaryKey   = 'kode_barang';
    public $incrementing    = false;
    protected $fillable     = ['kode_barang','nama_barang','harga_jual','harga_beli','satuan','stock','gambar'];
}
