<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table        = 'transaksi';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    protected $fillable     = ['id','user_id','total_transaksi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class,'transaksi_id');
    }
}
