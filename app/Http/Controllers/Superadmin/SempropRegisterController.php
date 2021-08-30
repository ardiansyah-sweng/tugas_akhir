<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Topikskripsi;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\SyaratUjian;
use App\Models\Syarat;

class SempropRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Topikskripsi::where('status','Accept')
        ->get();
        $dosen=Dosen::get();
        
        return view('pages.superadmin.semprop-register.index',compact('data','dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Syarat::where('id_SyaratUjian',$id)
        ->get();
        $prasyarat = SyaratUjian::where('id',$id)
        ->get();
     
        return view('pages.superadmin.semprop-register.detail-upload',compact('file','prasyarat'));
    }

    public function detail_file($id){
        $data=Syarat::find($id);
        // dd($data);      
        return view('pages.superadmin.semprop-register.detail-file',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id_syaratUjian = Syarat::where('id',$id)
        ->pluck("id_SyaratUjian");
        
        $request->validate([
            'status' => 'required',       
        ]);
        if($request->status == 2){
            //accept
            $data = $request->all();
            $updateStatus = Syarat::findOrFail($id);
            $updateStatus->update($data);
            return back()->with('alert-success','Data Berhasil di ubah');

        }elseif($request->status == 3){
            //reject
            $data['keterangan'] = $request->keterangan;
            $data = $request->all();
            $updateStatus = Syarat::findOrFail($id);
            $updateStatus->update($data);
            
            return back()->with('alert-success','Data Berhasil di ubah');
            
        }else{
           
            return back()->with('alert-failed','Data gagal di ubah');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
