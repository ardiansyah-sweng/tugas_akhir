<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Models\TopikBidang;
use App\Models\Topikskripsi;
use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\JadwalDosen;
use App\Models\DosenTerjadwal;
use App\Models\MahasiswaRegisterTopikDosen;
use App\Http\Controllers\Controller;

class PenjadwalanController extends Controller
{
    // Function untuk menampilkan data mahasiswa metopen dan skripsi include filter status mahasiswa
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

    // Funftion untuk menampilkan detail mahasiswa/i
    public function detailMahasiswa($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.detailMahasiswa', ['page' => 'Detail Mahasiswa Metopen & Skripsi'], compact('data'));
    }

    // Function untuk menampilkan kalendar penjadwalan seminar proposal
    public function jadwalSempropById($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.penjadwalanSempropById', ['page' => 'Tetapkan jadwal seminar proposal untuk'], compact('data'));
    }

    // Function untuk menampilkan kalendar penjadwalan pendadaran
    public function jadwalPendadaranById($id)
    {
        $data = Topikskripsi::findOrFail($id);
        return view('pages.superadmin.penjadwalan.penjadwalanPendadaranById', ['page' => 'Tetapkan jadwal pendadaran untuk'], compact('data'));
    }

    // Function untuk mengkonversi hari dari format kalendar ke format yang di buat dalam database
    public function GetHari(Request $request)
    {
        if (substr($request->hari, 0, 3) == 'Sun') {
            $hari      = 'minggu';
        } elseif (substr($request->hari, 0, 3) == 'Mon') {
            $hari       = 'senin';
        } elseif (substr($request->hari, 0, 3) == 'Tue') {
            $hari       = 'selasa';
        } elseif (substr($request->hari, 0, 3) == 'Wed') {
            $hari       = 'rabu';
        } elseif (substr($request->hari, 0, 3) == 'Thu') {
            $hari       = 'kamis';
        } elseif (substr($request->hari, 0, 3) == 'Fri') {
            $hari       = 'jumat';
        } elseif (substr($request->hari, 0, 3) == 'Sat') {
            $hari       = 'sabtu';
        }
        return $hari;
    }

    // Function untuk menampung array jam ujian
    public function arrayTime(Request $request)
    {
        $time = array(
            '1'    => '07:00 - 07:50',
            '2'    => '07:50 - 08:40',
            '3'    => '08:45 - 09:35',
            '4'    => '09:35 - 10:25',
            '5'    => '10:30 - 11:20',
            '6'    => '11:20 - 12:10',
            '7'    => '12:30 - 13:20',
            '8'    => '13:20 - 14:10',
            '9'    => '14:15 - 15:05',
            '10'    => '15:15 - 16:05',
        );
        return $time;
    }

    // Function generate jadwal untuk mencari rekomendasi jadwal pendadaran yang dapat di gunakan
    public function generateJadwalPendadaran(Request $request)
    {
        $this->validate($request, [
            'id'        => 'required',
            'hari'      => 'required'
        ]);

        $data = TopikSkripsi::findOrFail($request->id);
        $hari = $this->GetHari($request);
        $time = $this->arrayTime($request);

        // Ambil ID Dosen pembimbing yang akan di jadwalkan, relasi dari jadwal dosen dan topik skripsi
        $jadwalDosenPembimbing     = JadwalDosen::where('nipy', $data['nipy'])->get();
        $jadwalDosenPenguji1       = JadwalDosen::where('nipy', $data['dosen_penguji_1'])->get();
        $jadwalDosenPenguji2       = JadwalDosen::where('nipy', $data['dosen_penguji_2'])->get();

        // Eloquent ambil jadwal dosen yang sudah terdaftar pada tabel dosen terjadwal where date and id dosen
        $dosenPembimbingTerjadwal   = DosenTerjadwal::where('nipy', $data['nipy'])->where('date', $request->date)->get();
        $dosenPenguji1Terjadwal     = DosenTerjadwal::where('nipy', $data['dosen_penguji_1'])->where('date', $request->date)->get();
        $dosenPenguji2Terjadwal     = DosenTerjadwal::where('nipy', $data['dosen_penguji_2'])->where('date', $request->date)->get();

        $waktuTerpakai = array();
        // JADWAL DOSEN PENGUJI 1 TERJADWAL 
        foreach ($dosenPembimbingTerjadwal as $pembimbingTerjadwal) {
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke]      = Null;
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke + 1]  = Null;
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke + 2]  = Null;
        }

        // JADWAL DOSEN PENGUJI 1 TERJADWAL 
        foreach ($dosenPenguji1Terjadwal as $penguji1Terjadwal) {
            $waktuTerpakai[$penguji1Terjadwal->jam_ke]      = Null;
            $waktuTerpakai[$penguji1Terjadwal->jam_ke + 1]  = Null;
            $waktuTerpakai[$penguji1Terjadwal->jam_ke + 2]  = Null;
        }

        // JADWAL DOSEN PENGUJI 2 TERJADWAL
        foreach ($dosenPenguji2Terjadwal as $penguji2Terjadwal) {
            $waktuTerpakai[$penguji2Terjadwal->jam_ke]      = Null;
            $waktuTerpakai[$penguji2Terjadwal->jam_ke + 1]  = Null;
            $waktuTerpakai[$penguji2Terjadwal->jam_ke + 2]  = Null;
        }

        // DOSEN PEMBIMBING
        foreach ($jadwalDosenPembimbing as $pembimbing) {
            if ($pembimbing->$hari == 1) {
                $waktuTerpakai[$pembimbing->jam_ke]  = Null;
            }
        }

        // DOSEN PENGUJI 1
        foreach ($jadwalDosenPenguji1 as $penguji1) {
            if ($penguji1->$hari == 1) {
                $waktuTerpakai[$penguji1->jam_ke]  = Null;
            }
        }

        // DOSEN PENGUJI 2
        foreach ($jadwalDosenPenguji2 as $penguji2) {
            if ($penguji2->$hari == 1) {
                $waktuTerpakai[$penguji2->jam_ke]  = Null;
            }
        }

        $waktuTersedia = array();
        foreach ($waktuTerpakai as $wt => $value) {
            if ($wt == 1) {
                $waktuTersedia[1]   = Null;
            }
            if ($wt == 2) {
                $waktuTersedia[2]   = Null;
            }
            if ($wt == 3) {
                $waktuTersedia[3]   = Null;
            }
            if ($wt == 4) {
                $waktuTersedia[4]   = Null;
            }
            if ($wt == 5) {
                $waktuTersedia[5]   = Null;
            }
            if ($wt == 6) {
                $waktuTersedia[6]   = Null;
            }
            if ($wt == 7) {
                $waktuTersedia[7]   = Null;
            }
            if ($wt == 8) {
                $waktuTersedia[8]   = Null;
            }
            if ($wt == 9) {
                $waktuTersedia[9]   = Null;
            }
            if ($wt == 10) {
                $waktuTersedia[10]   = Null;
            }
        }

        $loop_array = array_diff_key($time, $waktuTersedia);
        $tampungArr = [];
        foreach ($loop_array as $key => $value) {
            if (isset($loop_array[$key + 1]) && isset($loop_array[$key + 2])) {
                $tampungArr[$key] = $value;
            }
        }

        $option   = '<option value="">--Pilih Jam--</option>';
        foreach ($tampungArr as $key => $value) {
            $option .= '<option value="' . $key . '"> ' . substr($value, 0, 5)  . '</option>';
        }
        echo $option;
    }

    // Function generate jadwal untuk mencari rekomendasi jadwal seminar proposal yang dapat di gunakan
    public function generateJadwalSemprop(Request $request)
    {
        $this->validate($request, [
            'id'        => 'required',
            'hari'      => 'required'
        ]);

        $data = TopikSkripsi::findOrFail($request->id);
        $hari = $this->GetHari($request);
        $time = $this->arrayTime($request);

        // Ambil ID Dosen pembimbing yang akan di jadwalkan, relasi dari jadwal dosen dan topik skripsi
        $jadwalDosenPembimbing     = JadwalDosen::where('nipy', $data['nipy'])->get();
        $jadwalDosenPenguji1       = JadwalDosen::where('nipy', $data['dosen_penguji_1'])->get();

        // Eloquent ambil jadwal dosen yang sudah terdaftar pada tabel dosen terjadwal where date and id dosen
        $dosenPembimbingTerjadwal   = DosenTerjadwal::where('nipy', $data['nipy'])->where('date', $request->date)->get();
        $dosenPenguji1Terjadwal     = DosenTerjadwal::where('nipy', $data['dosen_penguji_1'])->where('date', $request->date)->get();

        $waktuTerpakai = array();
        // JADWAL DOSEN PENGUJI 1 TERJADWAL 
        foreach ($dosenPembimbingTerjadwal as $pembimbingTerjadwal) {
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke]      = Null;
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke + 1]  = Null;
            $waktuTerpakai[$pembimbingTerjadwal->jam_ke + 2]  = Null;
        }

        // JADWAL DOSEN PENGUJI 1 TERJADWAL 
        foreach ($dosenPenguji1Terjadwal as $penguji1Terjadwal) {
            $waktuTerpakai[$penguji1Terjadwal->jam_ke]      = Null;
            $waktuTerpakai[$penguji1Terjadwal->jam_ke + 1]  = Null;
            $waktuTerpakai[$penguji1Terjadwal->jam_ke + 2]  = Null;
        }

        // DOSEN PEMBIMBING
        foreach ($jadwalDosenPembimbing as $pembimbing) {
            if ($pembimbing->$hari == 1) {
                $waktuTerpakai[$pembimbing->jam_ke]  = Null;
            }
        }

        // DOSEN PENGUJI 1
        foreach ($jadwalDosenPenguji1 as $penguji) {
            if ($penguji->$hari == 1) {
                $waktuTerpakai[$penguji->jam_ke]  = Null;
            }
        }

        $waktuTersedia = array();
        foreach ($waktuTerpakai as $waktu => $value) {
            if ($waktu == 1) {
                $waktuTersedia[1]   = Null;
            }
            if ($waktu == 2) {
                $waktuTersedia[2]   = Null;
            }
            if ($waktu == 3) {
                $waktuTersedia[3]   = Null;
            }
            if ($waktu == 4) {
                $waktuTersedia[4]   = Null;
            }
            if ($waktu == 5) {
                $waktuTersedia[5]   = Null;
            }
            if ($waktu == 6) {
                $waktuTersedia[6]   = Null;
            }
            if ($waktu == 7) {
                $waktuTersedia[7]   = Null;
            }
            if ($waktu == 8) {
                $waktuTersedia[8]   = Null;
            }
            if ($waktu == 9) {
                $waktuTersedia[9]   = Null;
            }
            if ($waktu == 10) {
                $waktuTersedia[10]   = Null;
            }
        }

        $loop_array = array_diff_key($time, $waktuTersedia);
        $tampungArr = [];
        foreach ($loop_array as $key => $value) {
            if (isset($loop_array[$key + 1]) && isset($loop_array[$key + 2])) {
                $tampungArr[$key] = $value;
            }
        }

        $option   = '<option value="">--Pilih Jam--</option>';
        foreach ($tampungArr as $key => $value) {
            $option .= '<option value="' . $key . '"> ' . substr($value, 0, 5)  . '</option>';
        }
        echo $option;
    }
}
