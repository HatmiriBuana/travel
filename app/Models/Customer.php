<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
class Customer extends Model
{
    use HasFactory;

    protected $table = 'tabel_customer';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
    ];

    // relasi one to many on transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'customer_id');
    }
}
