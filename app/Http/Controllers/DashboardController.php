<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Semester;
use App\Utils\CurrentSemester;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::Id();
        if (Auth::user()->hasRole('super_admin')) {
            $collOfSemesters = Semester::all(['*']);
            $semester = new CurrentSemester;
            $semester->semesters = $collOfSemesters;
            $currentSemester = $semester->getCurrentSemester();
            return view('pages.superadmin.dashboard', (compact('currentSemester')));
        }
        if (Auth::user()->hasRole('dosen')) {
            return view('pages.dosen.dashboard');
        }
        $data_mahasiswa = Mahasiswa::whereuser_id($id)->first();
        return view('pages.mahasiswa.dashboard', compact('data_mahasiswa'));
    }
}