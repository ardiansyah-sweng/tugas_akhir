<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaRegisterTopikDosen extends Model
{
    use HasFactory;
    protected $table = "mahasiswa_register_topik_dosenHide";

    protected $fillable = [
        'id_topikskripsi', 'nim','status' 
    ];

    public function getTopikSkripsi(){
        return $this->belongsTo(Topikskrisi::class,'id_topikskripsi','id');
    }
}
