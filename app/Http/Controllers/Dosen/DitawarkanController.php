<?php

namespace App\Http\Controllers\Dosen;
use Illuminate\Support\Facades\Auth;
use App\Mail\TopikDosenEmail;
use App\Mail\TopikMahasiswaEmail;
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
        #$id
        $userID = Auth::user()->id;
        
        //query nipy dari relasi tabel dosen
        #$data_dosen
        $recordOfLecturers = Dosen::whereuser_id($userID)->first();

        // query nipy dari relasi tabel skripsi dan topik bidang
        #$data 
        $collectionOfProposedProjects = Topikskripsi::where('nipy', $recordOfLecturers['nipy'])
        ->where('option_from','Mahasiswa')
        ->get();
        // dd($data);

        return view('pages.dosen.requestMahasiswa',compact('collectionOfProposedProjects'));
    }

    public function update(Request $request, $id){
        $accept['status'] = 'Accept';
        $reject['status'] = 'Reject';
        $mahasiswa['nim_terpilih'] = $request->nim;

        
        //query where id
        $data = MahasiswaRegisterTopikDosen::whereid($id)->first();
        $details = [
            'judul' =>$data->getTopikSkripsi->judul_topik,
            'topik' =>$data->getTopikSkripsi->topik->nama_topik,
            'dosen' =>$data->getTopikSkripsi->dosen->user->name,
        ];
        // Mail::to('nashirmuhammad117@gmail.com')->send(new TopikDosenEmail($details,$accept['status']));
        // // dd($data->getTopikSkripsi->dosen->user->name); jangan dipakai
        // die;
        
        $item = MahasiswaRegisterTopikDosen::whereNotIn('id',[$id])
        ->whereid_topikskripsi($request->id_topikskripsi)->get();
        
        // if($item){
        //     foreach($item as $val){
        //     // dd($val->mahasiswa->user->email); jangan di pakai
        //     Mail::to('nashirmuhammad117@gmail.com')->send(new TopikDosenEmail($details,$reject['status']));
        //     }
        // }
        
        // die;

        //query status Accept
        $data = MahasiswaRegisterTopikDosen::whereid($id)->update($accept);

        //query status rejct
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
        // Mail::to('nashirmuhammad117@gmail.com')->send(new TopikMahasiswaEmail($details));
        // return "email terkirim";
        // die;

          
        $item=Topikskripsi::where('id',$id)
        ->update($data);

        //redirect request mahasiswa
        return redirect('/mytopik')->with('alert-success','Request Berhasil di simpan');;
    }
}
