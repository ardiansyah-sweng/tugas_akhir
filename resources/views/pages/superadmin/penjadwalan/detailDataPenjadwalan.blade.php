@extends('layouts.master')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
                @include('layouts/error')
                <div class="page-header">                   
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">{{$page}}</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                    <div class="card-title">Detail Jadwal Ujian : <strong style="color: green">
                                                        @if ($data->topikSkripsi->mahasiswaTerpilih)
                                                        {{ $data->topikSkripsi->mahasiswaTerpilih->user->name}}
                                                        @elseif ($data->topikSkripsi->mahasiswaSubmit)
                                                        {{$data->topikSkripsi->mahasiswaSubmit->user->name}}
                                                        @endif
                                                    </strong>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col"><a href="{{ route('dataPenjadwalan') }}" class="btn btn-primary float-right btn-sm">
                                                    <i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="py-2 m-2">                                         
                                        <div class="row">
                                            <div class="col-2 font-weight-bold">Nim</div>
                                            <div class="col-1"><span class="float-right clearfix">:</span></div>
                                            <div>
                                                @if ($data->topikSkripsi->nim_terpilih)
                                                    {{$data->topikSkripsi->nim_terpilih}}
                                                @elseif ($data->topikSkripsi->nim_submit)
                                                    {{$data->topikSkripsi->nim_submit}}
                                                @endif    
                                            </div>
                                        </div>
                                        <hr>
                
                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Nama</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div>
                                                    @if ($data->topikSkripsi->mahasiswaTerpilih)
                                                        {{ $data->topikSkripsi->mahasiswaTerpilih->user->name}}
                                                    @elseif ($data->topikSkripsi->mahasiswaSubmit)
                                                        {{$data->topikSkripsi->mahasiswaSubmit->user->name}}
                                                    @endif
                                            </div>
                                        </div>
                                        <hr>
                
                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Judul Topik</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->judul_topik  }}</div>
                                        </div>
                                        <hr>
                
                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Deskripsi</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->deskripsi  }}</div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Dosen Pembimbing</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosen->user->name  }}</div>
                                        </div>
                                        <hr>
                
                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Dosen Penguji 1</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosenPenguji1->user->name  }}</div>
                                        </div>
                                        <hr>
                                        
                                        @if ($data->jenis_ujian == 1)
                                            <div class="row mt-3">
                                                <div class="col-2 font-weight-bold">Dosen Penguji 2</div>
                                                <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosenPenguji2->user->name  }}</div>
                                            </div>
                                            <hr>
                                        @endif                       

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Tanggal Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Waktu Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->waktu_mulai . ' - ' . $data->waktu_selesai}}</div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Room Meet</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div>Google Meet {{ $data->meet_room}}</div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Link Google Meet</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div><a href="{{ is_null($data->linkGoogleMeet) ? '-' : $data->linkGoogleMeet->link_google_meet }}" target="_blank">{{ is_null($data->linkGoogleMeet) ? 'Link Tidak Tersedia' : $data->linkGoogleMeet->link_google_meet }}</a></div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3">
                                            <div class="col-2 font-weight-bold">Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> 
                                                @if ($data->jenis_ujian == 0)
                                                    <strong class="badge badge-warning">Ujian Seminar Proposal</strong>
                                                    @elseif ($data->jenis_ujian == 1)
                                                    <strong class="badge badge-success">Ujian Pendadaran Tugas Akhir</strong>                                                                                                  
                                                @endif                                               
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
@section('script')
@endsection
@endsection

    