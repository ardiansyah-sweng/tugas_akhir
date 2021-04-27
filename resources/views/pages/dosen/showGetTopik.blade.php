@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Pemilih</div>
                            </div>
                            <div class="card-body">
                            @forelse ($getTopik as $item)
                        
                                <div class="col-md-4">
                                    <div class="card full-height">
                                        <div class="card-body">
                                            <div class="avatar avatar-xl">
                                                <img src="../../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="card-title">{{ $item->mahasiswa->user->name}}</div>
                                            <div class="card-category">Daily information about statistics in system</div>
                                            <div class="d-flex flex-wrap left-content-around pb-2 pt-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-4">
                                    <div class="card full-height">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                                <div class="card-title">Belum ada yang memilih</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection