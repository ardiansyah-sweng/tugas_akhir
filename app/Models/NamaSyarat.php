<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaSyarat extends Model
{
    use HasFactory;
    protected $table = "nama_syarat";

    protected $fillable = [
        'NamaSyarat'
    ];
    
}
