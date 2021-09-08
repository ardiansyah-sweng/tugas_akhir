<?php

namespace App\Http\Controllers\Dosen;
use App\Helpers\NilaiMahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use App\Models\Topikskripsi;
use App\Models\PertanyaanSemprop;
use App\Models\NilaiSemprop;
use App\Models\SyaratUjian;
use App\Models\Syarat;

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

            $nilaiPenguji = NilaiSemprop::where('option','penguji1')
            ->where('id_penjadwalan',$id_penjadwalan)
            ->pluck('nilai');
            
            $penguji = new NilaiMahasiswa;
            $valuePenguji = $penguji->nilai_semprop($countArrPenguji,$nilaiPenguji);

            
            $pembimbing = new NilaiMahasiswa;
            $valuePembimbing = $pembimbing->nilai_semprop($arrLengthValue,$request->pertanyaan);

            $lastValue = $valuePenguji+$valuePembimbing;

            if ($lastValue >= 62.50) {
                // lulus
                Topikskripsi::where('id',$id)
                ->update(['status_mahasiswa' =>'2']);
                return redirect('/bimbingan')->with('alert-success','Nilai berhasil di inputkan');
            }else{
                //mengulang
                Topikskripsi::where('id',$id)
                ->update(['status_mahasiswa' =>'0']);

                $syarat_ID = SyaratUjian::where('id_Skripsimahasiswa', $id)
                ->where('id_NamaUjian','1')
                ->pluck('id')
                ->first();
                
                Syarat::where('id_SyaratUjian',$syarat_ID)
                ->update(
                    [
                        'status'=>'3',
                    ]
                    );
                return redirect('/bimbingan')->with('alert-success','Nilai berhasil di inputkan');
                
            }
        }
    }
}
