<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratUjian extends Model
{
    use HasFactory;
    protected $table = "syarat_ujian";

    protected $fillable = [
        'id_Skripsimahasiswa', 'status','keterangan','id_NamaUjian'
    ];
}
