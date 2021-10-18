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
                        <a href="#">Set Periode Semester</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <div class="col">
                                    <div class="card-title">Periode Semester</div>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i> Tambah Semester
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Semester</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($semesters as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->start)) }}</td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($item->end)) }}
                                            </td>

                                            <td>
                                                @if ($item->semester !== $currentSemester->semester)
                                                <span class="badge badge-danger">Inactive</span>
                                                @else
                                                <span class="badge badge-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                            </td>
                                        </tr>
                                        @endforelse

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


<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        <strong>Tambah Periode Semester</strong></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" action="{{ route('addSemester') }}" method="POST" method="POST" enctype="multipart/form-data" id="addRowModal">
                <div class="modal-body">
                    <div class="mb-3">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputDateAwalSemester">Semester</label>
                            <select class="form-control" id="inputSelectSemester" name="inputSelectSemester">
                                @foreach ($periods as $semester)
                                @if ($semester === $currentSemester->semester){
                                <option selected>{{ $semester }}</option>
                                }
                                @else {
                                <option>{{ $semester }}</option>
                                }
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDateAwalSemester">Awal Semester</label>
                            <input type="date" id="inputDateAwalSemester" name="inputDateAwalSemester">
                            <span style="color:red" id="spanAlertInputDateAwalSemesterKosong"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputDateAkhirSemester">Akhir Semester</label>
                            <input type="date" id="inputDateAkhirSemester" name="inputDateAkhirSemester">
                            <span style="color:red" id="spanAlertInputDateAkhirSemesterKosong"></span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name="buttonSimpan" id="buttonSimpan" value="Simpan">
                    <div id="loadingProgress"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#addRowModal').on('shown.bs.modal', function() {
            $('.form').submit(function() {
                var inputDateAwalSemester = $('#inputDateAwalSemester').val().length;
                var inputDateAkhirSemester = $('#inputDateAkhirSemester').val().length;
                var pesanKosong = "Tidak boleh kosong!";

                if (inputDateAwalSemester == 0) {
                    $("#spanAlertInputDateAwalSemesterKosong").html(pesanKosong);
                    return false;
                }
                if (inputDateAkhirSemester == 0) {
                    $("#spanAlertInputDateAkhirSemesterKosong").html(pesanKosong);
                    return false;
                }
            });
        })

        $('#addRowModal').on('hidden.bs.modal', function() {
            location.reload();
        })
    });
</script>


@endsection