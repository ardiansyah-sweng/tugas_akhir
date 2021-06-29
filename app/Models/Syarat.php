<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    use HasFactory;
    protected $table = "syarat";

    protected $fillable = [
        'NamaSyaratFile', 'id_SyaratUjian','id_NamaSyarat','status','keterangan'
    ];
}
