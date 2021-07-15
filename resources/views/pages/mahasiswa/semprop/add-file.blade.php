@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                @include('layouts/error')
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @if (!$data)
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title text-center">Kamu belum mempunyai judul</div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-title">Pendaftaran Seminar Proposal</div>
                            <small>Masukkan yang sudah ada (.pdf)</small>
                        </div>
                    </div>
                </div>
                @foreach ($syarat as $item)
                @if (!$item->id_NamaSyarat==3)

                <div class="col-md-12">
                    <div class="card full-height">
                        <form action="{{ route('daftar-semprop.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Bukti Pembayaran</label>
                                            <input type="file" name="pembayaran"
                                                class="form-control-file @error('pembayaran') is-invalid @enderror"
                                                id="exampleFormControlFile1" required>
                                            @error('pembayaran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card full-height">
                        <form action="{{ route('daftar-semprop.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Bukti Pembayaran</label>
                                            @if ($item->status == 1)                                               
                                            <span class="badge badge-default"> <i class="fas fa-spinner"></i> Waiting</span>
                                            @endif
                                            <a href="{{ url('view_file/'.$item->id) }}" target="_blank" class="btn btn-secondary btn-xs ml-3"> <i class="fas fa-eye"></i> View</a>
                                            
                                            <input type="file" name="pembayaran"
                                                class="form-control-file @error('pembayaran') is-invalid @enderror"
                                                id="exampleFormControlFile1" required>
                                            @error('pembayaran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning ml-3">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>

        {{-- TOEFL --}}
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @if (!$data)
                @else
                <div class="col-md-12">
                    <div class="card full-height">
                        <form action="{{ route('daftar-semprop.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">TOEFL</label>
                                            <input type="file" name="toefl"
                                                class="form-control-file @error('toefl') is-invalid @enderror"
                                                id="exampleFormControlFile1" required>
                                            @error('toefl')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Naskah --}}
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @if (!$data)
                @else
                <div class="col-md-12">
                    <div class="card full-height">
                        <form action="{{ route('daftar-semprop.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Naskah BAB 1-3</label>
                                            <input type="file" name="naskah"
                                                class="form-control-file @error('naskah') is-invalid @enderror"
                                                id="exampleFormControlFile1" required>
                                            @error('naskah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Transakip --}}
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @if (!$data)
                @else
                <div class="col-md-12">
                    <div class="card full-height">
                        <form action="{{ route('daftar-semprop.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Transkip Nilai</label>
                                            <input type="file" name="transkip"
                                                class="form-control-file @error('transkip') is-invalid @enderror"
                                                id="exampleFormControlFile1" required>
                                            @error('trasnkip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

{{-- <script>
    $(".custom-file-input").on("change", function () {
        var files = Array.from(this.files)
        var fileName = files.map(f => {
            return f.name
        }).join(", ")
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script> --}}
@endsection
