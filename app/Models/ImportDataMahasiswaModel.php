<?php

namespace App;

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImportDataMahasiswaModel extends Model
{
    protected $table = "import_data_mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama'
    ];
}
