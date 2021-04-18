<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";
    use HasFactory;

    protected $fillable = [
        'nipy', 'nidn','jabfung','avatar','user_id'
    ];


    //atribut user_id adalah kepunyaan dari tb user, dan id adalak kepunyaan dari tb dosen
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    //atribut nipy adalah kepunyaan dari tabel topikSkripsi (FK)
    public function Skripsi(){
        return $this->hasMany(Topikskripsi::class,'nipy');
    }

    public function getAvatarAttribute($value){
        return url('storage/' . $value);
    }
}
