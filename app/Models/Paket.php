<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
