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
    public function model(array $column)
    {
        return new ImportDataMahasiswaModel([
            'nim' => $column[0],
            'nama' => $column[1]
        ]);
    }
}
