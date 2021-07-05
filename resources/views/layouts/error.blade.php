<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

@if (Session::has('alert-success'))
    <script>
        swal("Great Job!","{!! Session::get('alert-success') !!}",{
            icon : "success",
            buttons:{        			
				confirm: {
			        className : 'btn btn-success'
				}
			},
        });

    </script>
@endif

@if (Session::has('alert-failed'))
    <script>
        swal("Something Wrong!","{!! Session::get('alert-failed') !!}",{
            icon : "warning",
            buttons:{        			
				confirm: {
			        className : 'btn btn-warning'
				}
			},
        });

    </script>
@endif


