<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use App\Models\Topikskripsi;
use App\Models\PertanyaanSemprop;
use App\Models\NilaiSemprop;

class PenilaianSempropPembimbingController extends Controller
{
    public function show($id){
        $data_mahasiswa = Topikskripsi::where('id',$id)
        ->first();

        $date = Penjadwalan::where('topik_skripsi_id',$id)
        ->pluck('date')
        ->first();

        
        $pertanyaan_semprop = PertanyaanSemprop::where('isPembimbing', true)
        ->get();
        // dd($pertanyaan_semprop);


        $id_penjadwalan = Penjadwalan::where('topik_skripsi_id',$id)
        ->pluck('id')
        ->first();

        $isExistSemprop = NilaiSemprop::where('id_penjadwalan',$id_penjadwalan)
        ->where('option','pembimbing')
        ->get();
        
        $countArr = count($isExistSemprop);

        return view('pages.dosen.semprop.pembimbing.index',compact('data_mahasiswa','pertanyaan_semprop','date','countArr'));
    }

    public function update(Request $request, $id){
        $id_pertanyaan = PertanyaanSemprop::where('isPembimbing', true)
        ->pluck('id');

        $id_penjadwalan = Penjadwalan::where('topik_skripsi_id',$id)
        ->pluck('id')
        ->first();

        $data_skripsi = Topikskripsi::where('id',$id)
        ->first();

        $arrLengthID = count($id_pertanyaan);
        $arrLengthValue = count($request->pertanyaan);
        
        if ($arrLengthID == $arrLengthValue) {
            for($i = 0; $i<$arrLengthValue; $i++){
                NilaiSemprop::create([
                    "id_pertanyaanSemprop" => $id_pertanyaan[$i],
                    "id_penjadwalan" => $id_penjadwalan,
                    "nipy" => $data_skripsi->nipy,
                    "option" => "pembimbing",
                    "nilai" => $request->pertanyaan[$i],
                ]);
            }
        }
        

        //cek apakah penguji sudah menginputkan nilai
        $isPengujiNilai = NilaiSemprop::where('id_penjadwalan',$id_penjadwalan)
        ->where('option','penguji1')
        ->get();

        $countArrPenguji = count($isPengujiNilai);

        if($countArrPenguji == 0){
            return redirect('/bimbingan')->with('alert-success','Nilai berhasil di inputkan');
        }else{
            //di isi jika penguji sudah menginputkan nilai
        }
    }
}
