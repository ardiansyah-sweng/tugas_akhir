<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Topikskripsi;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\MahasiswaRegisterTopikDosen;

class PenawaranController extends Controller
{
    public function index(){
        //memanggil id dari tabel user
        $id=Auth::Id();

        //query nim dari relasi tabel dosen dan user
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();
        // dd($data_mahasiswa);   

        $getRegister = MahasiswaRegisterTopikDosen::where('nim', $data_mahasiswa->nim)->where('status','Waiting')->first();
        // dd($getRegister->nim);

            $judul = Topikskripsi::where('option_from','Dosen')
            ->whereNull('nim_terpilih')
            ->where('status','Open')
            ->get();
            // if($getRegister){
                return view('pages.mahasiswa.penawaran',compact('judul','getRegister','data_mahasiswa'));
            // }else{
            //     return view('pages.mahasiswa.penawaran',compact('judul','getRegister','data_mahasiswa'));
            // }
        
    }

    public function store(Request $request){
        $request->validate([
            'id_topikskripsi' => 'required',
            ]);
        $data = $request->all();

        //memanggil id dari tabel user
        $id=Auth::user()->id;

        //query nim dari relasi tabel dosen dan user
        $data_mahasiswa=Mahasiswa::whereuser_id($id)->first();
        // dd($data_mahasiswa->user->name);

        $data['nim'] = $data_mahasiswa->nim;
        $data['status'] = 'Waiting';

        // dd($data);

        MahasiswaRegisterTopikDosen::create($data);
        return redirect('/penawaran')->with('alert-success','Berhasil di ajukan');;

        
    }
}
    