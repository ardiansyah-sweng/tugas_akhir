<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index(){
        return view('pages.mahasiswa.penawaran');
    }
}
