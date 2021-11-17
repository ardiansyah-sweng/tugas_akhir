<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = "semesters";
    use HasFactory;

    protected $fillable = [
        'semester', 'start', 'end'
    ];
}
