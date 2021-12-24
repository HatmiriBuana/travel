<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tabel_transaksi';
    protected $fillable = [
        'tgl_transaksi',
        'total',
    ];
}
