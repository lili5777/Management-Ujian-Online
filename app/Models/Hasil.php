<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas',
        'id_mapelkelas',
        'id_jadwal',
        'jumlah_soal',
        'jawaban_benar',
        'jawaban_salah',
        'jawaban_kosong',
        'skor'
    ];
}
