<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paket;
use App\Models\Customer;
class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tabel_transaksi';
    protected $fillable = [
        'id',
        'transportasi',
        'tujuan_wisata',
        'jumlah',
        'tgl_berangkat',
        'tgl_transaksi',
        'total',
        'paket_id',
        'customer_id',
    ];

    // nonaktif timestamp
    public $timestamps = false;

    // relasi with Paket
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    // relasi with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
