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
                            <div class="row">

                            
                            @forelse ($collectionOfRegisteredSudents as $recordOfRegisteredStudent)
                        
                                <div class="col-md-4">
                                    <div class="card full-height">
                                        <div class="card-body">
                                            <div class="avatar avatar-xl">
                                                <img src="../../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="card-title">{{ $recordOfRegisteredStudent->mahasiswa->user->name}}</div>
                                            <div class="card-category">{{ $recordOfRegisteredStudent->nim}}</div>
                                            <div class="d-flex flex-wrap left-content-around pb-2 pt-4">
                                            </div>
                                            @if ($recordOfRegisteredStudent->status !='Waiting')
                                                @if ($recordOfRegisteredStudent->status =='Accept')
                                                    <button class="btn btn-danger col-md-12">
                                                        <i class="fa fa-lock"> Terpilih</i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-info col-md-12">
                                                        <i class="fa fa-clock"> Tidak Terpilih</i>
                                                    </button>
                                                @endif
                                            @else
                                                <form action="{{ route('mytopik.update', $recordOfRegisteredStudent->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="nim" value="{{ $recordOfRegisteredStudent->nim}}">
                                                    <input type="hidden" name="id_topikskripsi" value="{{ $recordOfRegisteredStudent->id_topikskripsi}}">
                                                        <button class="btn btn-primary col-md-12">
                                                            <i class="fa fa-plus"> Accept</i>
                                                        </button>
                                                </form>
                                            @endif
                                            
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
</div>
@endsection