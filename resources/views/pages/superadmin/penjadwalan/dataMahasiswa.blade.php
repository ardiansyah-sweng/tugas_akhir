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
                            <a href="#">Penjadwalan</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                    <div class="card-title">{{$page}}</div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-4 pb-3">
                                            <h5><strong>Filter Mahasiswa</strong></h5>
                                            <select name="filter" id="filter-penjadwalan" class="form-control">
                                                    <option value="">Semua Mahasiswa</option>
                                                    @foreach ($statusMahasiswa as $key => $val)
                                                        <option value="{{ $key }}" @if(strval($key) == strval($filter))selected @endif>{{ $val }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="table-responsive"  id="tabel">
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nim</th>
                                                <th>Mahasiswa</th>
                                                <th>Judul</th>
                                                <th>Penguji</th>
                                                <th>Periode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->mahasiswaTerpilih->nim }}</td>
                                                    <td>{{ $item->mahasiswaTerpilih->user->name }}</td>
                                                    <td>{{ $item->judul_topik }}</td>
                                                    <td>
                                                        <img width="40px"
                                                            src="{{ url('uploads/pengguna/' . $item->dosenPenguji1->avatar) }}">
                                                        <img width="40px"
                                                            src="{{ url('uploads/pengguna/' . $item->dosenPenguji2->avatar) }}">
                                                    </td>
                                                    <td>
                                                        <strong class="badge badge-primary">{{ $item->periode->tahun_periode }}</strong>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="Detail Data" href="{{ route('detailMahasiswa', $item->id)  }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                                @if ($item->status_mahasiswa == 1)
                                                                    <a data-toggle="tooltip" title="" class="btn btn-link btn-info " data-original-title="Jadwalkan" href="{{ route('jadwalSempropByid', $item->id)}}">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </a>
                                                                @elseif ($item->status_mahasiswa == 3)
                                                                    <a data-toggle="tooltip" title="" class="btn btn-link btn-info " data-original-title="Jadwalkan" href="{{ route('jadwalPendadaranByid', $item->id)}}">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </a>
                                                                @endif                                                    
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>           

@section('script')
<script src="{{ url('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        const filterPenjadwalan = $('#filter-penjadwalan');

        // Generate filter kemudian mengirim nilai sesuai paramater
        function generateFilterUri() {
            const filter = filterPenjadwalan.val();
            return window.location.href.replace( /[\?#].*|$/, `?filter=${filter}` );
        }

        // If filter has changed
        filterPenjadwalan.change(function() {
            // Redirect page
            window.location.href = generateFilterUri();
        });

        $('#basic-datatables').DataTable({});

    });

</script>

@endsection
@endsection

    