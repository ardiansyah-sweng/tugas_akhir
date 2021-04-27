<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\TopikBidang;
use App\Models\Topikskripsi;
use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Mahasiswa;

class TopikController extends Controller
{
    public function index(){
        $topik = TopikBidang::all();
        $dosen = Dosen::with('user')->get();
        $periode = Periode::where('status','1')->get();
        return view('pages.mahasiswa.addTopik',compact('topik','dosen','periode'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'judul_topik' => 'required',
            'deskripsi' => 'required|min:10',
            'id_topikbidang' => 'required',
            'nipy' => 'required',
            'id_periode' => 'required',
            ]);
        $data = $request->all();
        
        //memanggil id dari tabel user
        $id=Auth::Id();

        //query nim dari relasi tabel dosen dan user
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();

        
        $data['option_from'] = "Mahasiswa";
        $data['nim_submit'] = $data_mahasiswa->nim;

        $tanggal_hari_ini = date("Y-m-d");

        //pecah date
        $pecah_tanggal = explode("-", $tanggal_hari_ini);

        $duedate =mktime(0,0,0, $pecah_tanggal[1],$pecah_tanggal[2]+7,$pecah_tanggal[0]);
        $tanggal_deadline=date('Y-m-d', $duedate);

        $data['duedate'] = $tanggal_deadline;
        // dd($data);

           
        Topikskripsi::create($data);
        return redirect('/topik');

        }
}
