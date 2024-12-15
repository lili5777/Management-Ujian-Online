<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas',
        'id_mapelkelas',
        'id_jadwal',
        'pertanyaan',
        'kunci',
        'a',
        'b',
        'c',
        'd',
    ];
}
