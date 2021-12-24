<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'tabel_detail';
    protected $fillable = [
        'tujuan_wisata',
        'jumlah',
        'tgl_berangkat',
        'transportasi',
    ];
}
