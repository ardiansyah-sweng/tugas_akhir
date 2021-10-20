<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup;
use App\Models\GoogleMeet;
use App\Models\Semester;
use App\Utils\CurrentSemester;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportDataMahasiswa;
use Carbon\Carbon;
use App\Models\Penjadwalan;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hari = Setup::all()->first();
        return view('pages.superadmin.setup.index', compact('hari'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Setup::findOrFail($id);
        $item->update($data);

        //$hari = Setup::all()->first();

        return redirect('/setup')->with('alert-success', 'Data Berhasil di ubah');
    }

    public function getListOfYears()
    {
        ## TODO constants minYear dan maxYear disiapkan di setting superadmin atau helper atau env dll
        $minYear = 2000;
        $maxYear = 2030;
        $oddEven = ['Gasal', 'Genap'];
        for ($year = $minYear; $year <= $maxYear; $year++) {
            foreach ($oddEven as $period) {
                $periods[] = $period . ' ' . $year . '-' . ($year + 1);
            }
        }
        return $periods;
    }

    public function setSemester()
    {
        $semesters = Semester::all();
        $currentSemester = new CurrentSemester;
        $currentSemester->semesters = $semesters;
        $currentSemester = $currentSemester->getCurrentSemester();
        $periods = $this->getListOfYears();
        return view('pages.superadmin.setup.setSemester', compact('semesters', 'currentSemester', 'periods'));
    }

    function isSemesterExistInDB($inputSelectSemester)
    {
        $semesters = Semester::all();
        foreach ($semesters as $semester) {
            if ($semester->semester === $inputSelectSemester) {
                return response()->json($inputSelectSemester);
            }
        }
    }

    function isSemesterPeriodOverlap($start, $end)
    {
        $start = strtotime($start);
        $end = strtotime($end);
        if ($end < $start) {
            return 1;
        }
        if ($start === $end) {
            return 2;
        }
    }

    public function isInsufficientSemesterPeriod($start, $end)
    {
        ## TODO dideklarasikan di bagian setup env untuk menentukan periode minimal.
        $minSemesterPeriodInMonth = 4;
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $start);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $end);
        if ($to->diffInMonths($from) < $minSemesterPeriodInMonth){
            return true;
        }
    }

    public function addSemester(Request $request)
    {
        ## TODO validasi jika year now tidak ada semesternya
        ## check validasi ini dilakukan setiap awal login superadmin
        ## jika terjadi, maka diminta utk entry semester

        if ($this->isSemesterExistInDB($request->inputSelectSemester)) {
            return redirect('/set-semester')->with('alert-warningSemester', 'Periode semester sudah ada.');
        }

        if ($this->isSemesterPeriodOverlap($request->inputDateAwalSemester, $request->inputDateAkhirSemester) === 1) {
            return redirect('/set-semester')->with('alert-warningSemester', 'Akhir semester harus lebih besar dari awal semester');
        }

        if ($this->isSemesterPeriodOverlap($request->inputDateAwalSemester, $request->inputDateAkhirSemester) === 2) {
            return redirect('/set-semester')->with('alert-warningSemester', 'Akhir dan Awal Semester tidak boleh sama');
        }

        if ($this->isInsufficientSemesterPeriod($request->inputDateAwalSemester, $request->inputDateAkhirSemester)) {
            return redirect('/set-semester')->with('alert-warningSemester', 'Periode wajib minimal 4 bulan');
        }

        Semester::create([
            'semester' => $request->inputSelectSemester,
            'start' => $request->inputDateAwalSemester,
            'end'   => $request->inputDateAkhirSemester
        ]);

        return redirect('/set-semester')->with('alert-success', 'Periode semester Berhasil di tambah');
    }

    public function getDataMahasiswa()
    {
        return view('pages.superadmin.setup.importDataMahasiswa');
    }

    public function importDataMahasiswa(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);
        Excel::import(new ImportDataMahasiswa, public_path('/DataMahasiswa/' . $namaFile));
        return redirect('/data-mahasiswa')->with('alert-success', 'Jadwal Berhasil Diimport');
    }

    // Function untuk mengambil semua data link google meet
    public function getlinkGoogleMeet()
    {
        $data   = GoogleMeet::all();
        // $data   = GoogleMeet::orderBy('id', 'DESC')->get();
        $id     = GoogleMeet::select('title_room')->orderBy('title_room', 'desc')->take(1)->first();
        if ($id == null) {
            $nextTitleGoogleMeet = 1;
        } else {
            $nextTitleGoogleMeet = $id['title_room'] + 1;
        }

        return view('pages.superadmin.setup.linkGoogleMeet', ['page' => 'Setup Google Meet'], compact('data', 'nextTitleGoogleMeet'));
    }

    // function untuk menyimpan link google meet yang di input oleh admin
    public function storeGoogleMeet(Request $request)
    {
        $this->validate($request, [
            'title_room'        => 'required',
            'link_google_meet'  => 'required',
        ]);

        $link = new GoogleMeet;
        $link->title_room = $request->title_room;
        $link->link_google_meet = $request->link_google_meet;
        $link->save();
        return redirect('linkGoogleMeet')->with('alert-success', 'Link Google Meet Berhasil Ditambahkan');
    }

    // Function untuk menghapus link google meet
    public function deleteLinkGoogleMeet($id)
    {
        GoogleMeet::destroy($id);
        return redirect('linkGoogleMeet')->with('alert-success', 'Link Google Meet Berhasil Dihapus');
    }
}
