<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topikskripsi;
use App\Models\Syarat;
use App\Models\SyaratUjian;
use App\Models\Logbook;

class PendadaranRegisterController extends Controller
{
    public function index(){
         $data=Topikskripsi::where('status_mahasiswa','2')
        ->get();

        // dd($data);
        
        return view('pages.superadmin.pendadaran-register.index',compact('data'));
    }

    public function show($id){
        $file = Syarat::where('id_SyaratUjian',$id)
        ->get();
        $prasyarat = SyaratUjian::where('id',$id)
        ->get();

         return view('pages.superadmin.pendadaran-register.detail-upload',compact('file','prasyarat'));
    }

    public function update(Request $request, $id){
        $id_syaratUjian = Syarat::where('id',$id)
        ->pluck("id_SyaratUjian");


         $semuaSyarat= Syarat::where('id_SyaratUjian',$id_syaratUjian)
        ->pluck('id_NamaSyarat');

        $id_skripsi = SyaratUjian::where('id',$id_syaratUjian)
        ->pluck('id_Skripsimahasiswa')
        ->first();
        
        $logbook = Logbook::where('id_topikskripsi',$id_skripsi)
        ->where('status',1)
        ->pluck('status');

        $jumlahAccept= count($logbook);
        $temp = [];
        $tempStatus = [];
        $statusBerhasil = [2,2,2,2,2];

        foreach($semuaSyarat as $berkas){
            array_push($temp,$berkas);
        }

        $request->validate([
            'status' => 'required',       
        ]);
        if($request->status == 2){
            $data = $request->all();
            $updateStatus = Syarat::findOrFail($id);
            $updateStatus->update($data);

            $status = Syarat::where('id_SyaratUjian',$id_syaratUjian)
            ->pluck('status');
            foreach($status as $id_status){
                array_push($tempStatus,$id_status);
            }

            if(in_array("1",$temp)){
                if(in_array("2",$temp)){
                    if(in_array("3",$temp)){                   
                        if(in_array("4",$temp)){                   
                            if(in_array("5",$temp)){                           
                                if ($tempStatus == $statusBerhasil) {
                                    if($jumlahAccept >= 3){
                                        SyaratUjian::where('id_Skripsimahasiswa',$id_skripsi)
                                        ->where('id_NamaUjian','2')
                                        ->update(['status'=>1]);

                                        Topikskripsi::where('id',$id_skripsi)
                                        ->update(['status_mahasiswa'=>3]);
                                    }
                                }
                            }
                        }
                    }    
                }
            }

            return back()->with('alert-success','Data Berhasil di ubah');
        }elseif($request->status == 3){
            $data['keterangan'] = $request->keterangan;
            $data = $request->all();
            $updateStatus = Syarat::findOrFail($id);
            $updateStatus->update($data);
            return back()->with('alert-success','Data Berhasil di ubah');
        }else{
            return back()->with('alert-failed','Data gagal di ubah');
        }
    }
}
