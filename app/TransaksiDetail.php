<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table        = 'transaksi';
    protected $fillable     = ['transaksi_id','kode_barang','jumlah_pembelian','total_harga'];
}
