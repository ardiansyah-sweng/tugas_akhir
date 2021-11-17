<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

@if (Session::has('alert-success'))
<script>
    swal("Great Job!", "{!! Session::get('alert-success') !!}", {
        icon: "success",
        buttons: {
            confirm: {
                className: 'btn btn-success'
            }
        },
    });
</script>
@endif

@if (Session::has('alert-failed'))
<script>
    swal("Tidak Dapat Menjadwalkan", "{!! Session::get('alert-failed') !!}", {
        icon: "warning",
        buttons: {
            confirm: {
                className: 'btn btn-info'
            }
        },
    });
</script>
@endif

@if (Session::has('alert-warningSemesterIsExist'))
<script>
    swal("Tidak bisa menambahkan Periode Semester", "{!! Session::get('alert-warningSemesterIsExist') !!}", {
        icon: "warning",
        buttons: {
            confirm: {
                className: 'btn btn-info'
            }
        },
        dangerMode: true
    });
</script>
@endif

@if (Session::has('alert-warningSemesterOverlap'))
<script>
    swal("Tidak bisa menambahkan Periode Semester", "{!! Session::get('alert-warningSemesterOverlap') !!}", {
        icon: "warning",
        buttons: {
            confirm: {
                className: 'btn btn-info'
            }
        },
        dangerMode: true
    });
</script>
@endif