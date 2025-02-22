<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas',
        'id_mapelkelas',
        'tgl_ujian',
        'jam',
        'menit',
        'jenis_ujian'
    ];
}
