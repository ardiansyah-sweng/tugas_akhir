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

    public function detailMahasiswa($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.detailMahasiswa', ['page' => 'Detail Mahasiswa Metopen & Skripsi'], compact('data'));
    }

    public function jadwalSempropById($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.penjadwalanSempropById', ['page' => 'Tetapkan jadwal seminar proposal untuk'], compact('data'));
    }

    public function jadwalPendadaranById($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.penjadwalanPendadaranById', ['page' => 'Tetapkan jadwal pendadaran untuk'], compact('data'));
    }
}
