<?php

namespace App;

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImportDataMahasiswaModel extends Model
{
    protected $table = "tes_import_mhs";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama'
    ];
}
