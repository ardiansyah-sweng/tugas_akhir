<?php

namespace App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Auth;
use App\Mail\TopikDosenEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaRegisterTopikDosen;
use App\Models\Topikskripsi;
use App\Models\Dosen;

class DitawarkanController extends Controller
{


    public function index(){
        //memanggil id dari tabel user
        $id=Auth::user()->id;
        
        //query nipy dari relasi tabel dosen
        $data_dosen=Dosen::whereuser_id($id)->first();

        // $data_get_skripsi=MahasiswaRegisterTopikDosen::all();
        // dd($data_get_skripsi);

        // $jumlah_pemilih=MahasiswaRegisterTopikDosen::where('id_topikskripsi','');

        // //query nipy dari relasi tabel skripsi dan topik bidang
        $data= Topikskripsi::where('nipy',$data_dosen['nipy'])
        ->where('option_from','Mahasiswa')
        ->get();
        // dd($data);

        return view('pages.dosen.requestMahasiswa',compact('data'));
    }

    public function update(Request $request, $id){
        // $data = $request->all();
        // dd($id);
        // dd($request->nim);
        $accept['status'] = 'Accept';
        $reject['status'] = 'Reject';
        $mahasiswa['nim_terpilih'] = $request->nim;
        
        

        //query status tb_getTOpikSkiripsi all
        $data = MahasiswaRegisterTopikDosen::whereid($id)->update($accept);

        //reject
        $item=MahasiswaRegisterTopikDosen::whereNotIn('id',[$id])
        ->whereid_topikskripsi($request->id_topikskripsi)
        ->update($reject);

        

        //query pindah nim tb_getTopikSkripsi -> skripsi
        $row=Topikskripsi::whereid($request->id_topikskripsi)->update(
            [
                'nim_terpilih' => $request->nim,
                'status' => 'Accept'
                ]
        );


        //query status tb skripsi terpilih



        //redirect topiksaya
        return redirect('/penelitian')->with('alert-success','Data Berhasil di simpan');;


    }

    public function edit(Request $request){
        $id = $request->id;

        if ($request->type=='Accept') {
            $data['status'] = 'Accept';
        }else{
            $data['status'] = 'Reject';
        }

        // return view('emails.topikDosen');
        // die;
        $dataMhs=Topikskripsi::whereid($id)->first();
        // dd($dataMhs->dosen->user->name); 

        // $details=[
        //     'judul' =>$dataMhs->judul_topik,
        //     'topik' =>$dataMhs->topik->nama_topik,
        //     'dosen' =>$dataMhs->dosen->user->name,
        //     'type' =>$request->type,
        // ];
        // Mail::to('nashirmuhammad117@gmail.com')->send(new TopikDosenEmail($details));
        // return "email terkirim";
        // die;

          
        $item=Topikskripsi::where('id',$id)
        ->update($data);

        //redirect request mahasiswa
        return redirect('/mytopik')->with('alert-success','Request Berhasil di simpan');;
    }
}
