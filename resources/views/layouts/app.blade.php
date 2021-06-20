<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <button class="btn btn-primary btn-round loginWithOTP" id="loginWithOTP">Login with OTP</button>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

<!-- Classic Modal -->
<div class="modal fade" id="loginWithOTPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <h4 class="modal-title">One Time Password</h4>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter your valid UAD email</label>
                    <input type="email" class="form-control" id="inputEmail" required="required" aria-describedby="emailHelp" placeholder="Eq. zainab21000223@webmail.uad.ac.id, zainab@tif.ac.id">
                </div>
                <div id="formGroupInputOTP" class="form-group inputOTP">
                    <label style="display:none" for="inputOTP" id="labelInputOTP">Enter your OTP</label>
                    <input style="display:none" type="input" class="form-control" id="inputOTP" required="required" maxlength="10" style="width:200px">

                </div>
            </div>
            <div id="response">
            </div>
            <div id="tes">
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-primary" id="submitOTP">Send my OTP</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- script untuk mengambil value select -->
<script>
    $(document).ready(function() {
        $('.loginWithOTP').click(function() {
            $('#loginWithOTPModal').modal("show");
        });
    });
</script>

<!-- script untuk validasi email -->
<script>
    $(document).ready(function() {
        $('#submitOTP').click(function() {
            var email = $('#inputEmail').val();
            var alertMessageForValidEmail = 'Check your email to get your OTP'
            var alertMessageEmptyEmail = 'Enter your valid email'
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if (!email) {
                $('#response').html('<div class="alert alert-danger alert-dismiss">' + alertMessageEmptyEmail + "</div>");
            }

            if (email && !emailReg.test(email)) {
                $('#response').html('<div class="alert alert-warning alert-dismiss">' + alertMessageEmptyEmail + "</div>");
            }

            if (email && emailReg.test(email)) {
                // $.ajax({
                //     url:'',
                //     method:'POST',
                //     data:{email:email},
                //     dataType:"JSON",
                //     success:function(data){

                //     }
                // });

                $('#response').html('</div><div class="alert alert-success alert-dismiss">' + alertMessageForValidEmail + "</div>");
                $('#labelInputOTP').show();
                $('#inputOTP').show();
                $('#inputOTP').trigger('focus');
                $('#submitOTP').html('Login');
            }
        });
    });
</script>