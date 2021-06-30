<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopikBidang;
use App\Models\Topikskripsi;
use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\MahasiswaRegisterTopikDosen;

class PenjadwalanController extends Controller
{
    public function dataMahasiswa(Request $request)
    {
        $statusMahasiswa = [
            '0' => 'On Progres Metopen',
            '1' => 'Ready to Schedule Semprop',
            '2' => 'On Progres Skripsi',
            '3' => 'Ready to Schedule Skripsi'
        ];
        $topikSkripsi = Topikskripsi::orderBy('id', 'desc');
        $filter = $request->get('filter' ?? '');

        if (strlen($filter) > 0) {
            if (strlen($filter) > 0) $topikSkripsi->where('status_mahasiswa', $filter)->where('status', 'Accept');
        }

        $data = $topikSkripsi->get();
        return view('pages.superadmin.penjadwalan.dataMahasiswa', ['page' => 'Data Mahasiswa Metopen & Skripsi'], compact('data', 'filter', 'statusMahasiswa'));
    }
}
