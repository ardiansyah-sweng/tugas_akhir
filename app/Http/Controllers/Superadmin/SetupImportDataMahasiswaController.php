<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportDataMahasiswa;

class SetupImportDataMahasiswaController extends Controller
{
    // Function import jadwal dosen dari file excel ke database program simtakhir
    public function importJadwalDosenExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);
        Excel::import(new ImportDataMahasiswa, public_path('/DataMahasiswa/' . $namaFile));
        //return redirect('/jadwalDosen')->with('alert-success', 'Jadwal Berhasil Diimport');
    }
}
