<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
class Paket extends Model
{
    use HasFactory;
    protected $table = 'tabel_paket';
    protected $fillable = [
        'nama',
        'jam_berangkat',
        'jam_tiba',
        'harga',
    ];

    // relasi one to many on transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'paket_id');
    }
}
