<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImportDataMahasiswaModel extends Model
{
    protected $table = "test_import_mhs";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama'
    ];
}
