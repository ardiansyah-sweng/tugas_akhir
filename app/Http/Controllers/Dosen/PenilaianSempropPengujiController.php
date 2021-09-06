<?php

namespace App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Topikskripsi;

class PenilaianSempropPengujiController extends Controller
{
    public function index(){
        $id=Auth::user()->id;

        //query nipy dari relasi tabel dosen
        $data_dosen=Dosen::whereuser_id($id)->first();

        $daftar_mahasiswa = Topikskripsi::where('status_mahasiswa','1')
        ->where('dosen_penguji_1',$data_dosen->nipy)
        ->get();

        return view('pages.dosen.semprop.penguji.index',compact('daftar_mahasiswa'));
    }
}
