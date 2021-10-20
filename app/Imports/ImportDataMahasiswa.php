<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\ImportDataMahasiswaModel;

class ImportDataMahasiswa implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ImportDataMahasiswaModel([
            'nim' => $row[1],
            'nama' => $row[2],
        ]);
    }
}
