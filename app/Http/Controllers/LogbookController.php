<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Topikskripsi;
use App\Models\Mahasiswa;
use App\Models\Logbook;

class LogbookController extends Controller
{
    public function index(){
        $id=Auth::Id();

         //query nim dari relasi tabel dosen dan user
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();

        $data = Topikskripsi::where('nim_terpilih',$data_mahasiswa->nim)
        ->orWhere('nim_submit',$data_mahasiswa->nim)
        ->where('status','Accept')
        ->first();
        if($data){
            $logbook = Logbook::where('id_topikskripsi',$data->id)
        ->get();
        return view('pages.mahasiswa.logbook.index',compact('data','logbook'));
    }
    return view('pages.mahasiswa.logbook.index',compact('data'));
        // dd($data);
        

        // dd($logbook);
    }

    public function create(){
        $id=Auth::Id();

         //query nim dari relasi tabel dosen dan user
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();

        $data = Topikskripsi::where('nim_terpilih',$data_mahasiswa->nim)
        ->orWhere('nim_submit',$data_mahasiswa->nim)
        ->where('status','Accept')
        ->first();
        return view('pages.mahasiswa.logbook.create',compact('data'));
    }

    public function store(Request $request){
        // dd($request);
        $id=Auth::Id();
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();

        $topik = Topikskripsi::where('nim_terpilih',$data_mahasiswa->nim)
        ->orWhere('nim_submit',$data_mahasiswa->nim)
        ->first();

        $request->validate([
            'kegiatan' => 'required',
            'catatan_kemajuan' => 'required|min:10',
            ]);
        $data = $request->all();
        $data['status'] = 0;
        $data['id_topikskripsi'] = $topik->id;

        Logbook::create($data);
        return redirect('/logbook')->with('alert-success','Data Berhasil di tambah');
    }

    
}
