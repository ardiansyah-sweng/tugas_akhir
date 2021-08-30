<?php
    $url = file_get_contents('http://localhost:5002/api');
    $data = json_decode($url);

    foreach ($data as $value) {

    	# code...
		$dataPoints = array(
			array("label"=> "PS", "y"=> $value->PS),
			array("label"=> "FD", "y"=> $value->FD),
			array("label"=> "KK", "y"=> $value->KK),
			array("label"=> "SPK", "y"=> $value->SPK),
			array("label"=> "JK", "y"=> $value->JK),
			array("label"=> "ML", "y"=> $value->ML),
			array("label"=> "DM", "y"=> $value->DM),
			array("label"=> "AP", "y"=> $value->AP),
			array("label"=> "MP", "y"=> $value->MP),
			array("label"=> "PC", "y"=> $value->PC),
			array("label"=> "PBA", "y"=> $value->PBA),
			array("label"=> "IMK", "y"=> $value->IMK),
			array("label"=> "SP", "y"=> $value->SP),
			array("label"=> "M", "y"=> $value->M),
			array("label"=> "K", "y"=> $value->K),
			array("label"=> "G", "y"=> $value->G),
			array("label"=> "WI", "y"=> $value->WI)

    );}
?>

<!doctype html>
<html lang="en">

<head>
    
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>SIMTAKHIR</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--====== buat trand topik ======-->
    <script>
        window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "TREND"
            },
            axisY: {
                title: "Probabilitas"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        }
    </script>
    


</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/logo.png" alt="Logo" width="80px" hight="80px">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne"
                                aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">TRAND TOPIK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">TOPIK TEPOPULER</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="navbar-social d-none d-sm-flex align-items-center">
                                <span>SIMTAKHIR</span>
                                <ul>
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                            <h3 class="header-title">TUGAS AKHIR</h3>
                            <p class="text"> karya ilmiah yang disusun oleh mahasiswa setiap program studi berdasarkan
                                hasil penelitian suatu masalah yang dilakukan secara seksama dengan bimbingan dosen
                                pembimbing</p>
                            <ul class="header-btn">
                                <li><a class="main-btn btn-one" href="coba2.php">l O G I N</a></li>
                                <li><a class="main-btn btn-two video-popup"
                                        href="https://www.youtube.com/watch?v=r44RKWyfcFw">Login with OTP</a></li>
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="assets/images/header-shape.svg" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Trend Topik</h4>
                        <p class="text">Tren topik adalah banyaknya kata yang sering muncul pada setiap judul dari masing-masing topik</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Nama Singkatan Dari Topik</h4>
                                    <p class="text">Pengembangan Sistem (PS)</br>Forensik Digital (FD)</br>Keamanan Komputer (KK)</br>Sistem Pendukung Keputusan (SPK)</br>Jaringan Komputer (JK)
                                    </br>Mechine Learning (ML)</br>Data Mining (DM)</br>Algoritma Pencarian (AP)</br>Media Pembelajaran (MP)</br>Pengolahan Citra (PC)</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                
                                <div class="services-content media-body">
                                    
                                    <p class="text"></br></br></br>Pengolahan Citra (PC) </br>Pengolahan Bahasa Alami (PBA)</br>Interaksi Manusia dan Komputer (IMK)</br>Sistem Pakar (SP)</br>Multimedia (M)</br>Kripto (K)
                                    </br>Game (G)</br>Web Indexing (WI)</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        
                        
                        
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div> <!-- services image -->
    </section>

    <!--====== SERVICES PART ENDS ======-->
    <!--====== SERVICES PART START ======-->

    <section id="pricing" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Topik Populer</h4>
                        <p class="text">Topik Populer adalah banyaknya judul mahasiswa dari masing-masing topik</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Nama Singkatan Dari Topik</h4>
                                    <p class="text">Pengembangan Sistem (PS)</br>Forensik Digital (FD)</br>Keamanan Komputer (KK)</br>Sistem Pendukung Keputusan (SPK)</br>Jaringan Komputer (JK)
                                    </br>Mechine Learning (ML)</br>Data Mining (DM)</br>Algoritma Pencarian (AP)</br>Media Pembelajaran (MP)</br>Pengolahan Citra (PC)</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                
                                <div class="services-content media-body">
                                    
                                    <p class="text"></br></br></br>Pengolahan Citra (PC) </br>Pengolahan Bahasa Alami (PBA)</br>Interaksi Manusia dan Komputer (IMK)</br>Sistem Pakar (SP)</br>Multimedia (M)</br>Kripto (K)
                                    </br>Game (G)</br>Web Indexing (WI)</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        
                        
                        
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div style="width: 100% ;height: 370px">
		        <canvas id="myChart"></canvas>
            </div>
        </div> <!-- services image -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->









    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['PS', 'FD', 'KK', 'SPK', 'JK', 'ML', 'DM',' AP', 'MP', 'PC', 'PBA', 'IMK', 'SP', 'M', 'K', 'G', 'WI'],
                datasets: [{
                    label: 'Judul Skripsi',
                    data: [
                        <?php  foreach ($data as $value) { echo $value->popPS; }?>,
                        <?php  foreach ($data as $value) { echo $value->popFD; }?>, 
                        <?php  foreach ($data as $value) { echo $value->popKK; }?>, 
                        <?php  foreach ($data as $value) { echo $value->popSPK; }?>, 
                        <?php  foreach ($data as $value) { echo $value->popJK; }?>, 
                        <?php  foreach ($data as $value) { echo $value->popML; }?>,
                        <?php  foreach ($data as $value) { echo $value->popDM; }?>,
                        <?php  foreach ($data as $value) { echo $value->popAP; }?>,
                        <?php  foreach ($data as $value) { echo $value->popMP; }?>,
                        <?php  foreach ($data as $value) { echo $value->popPC; }?>,
                        <?php  foreach ($data as $value) { echo $value->popPBA; }?>,
                        <?php  foreach ($data as $value) { echo $value->popIMK; }?>,
                        <?php  foreach ($data as $value) { echo $value->popSP; }?>,
                        <?php  foreach ($data as $value) { echo $value->popM; }?>,
                        <?php  foreach ($data as $value) { echo $value->popK; }?>,
                        <?php  foreach ($data as $value) { echo $value->popG; }?>,
                        <?php  foreach ($data as $value) { echo $value->popWI; }?>],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 178, 0.2)',
                    'rgba(54, 162, 255, 0.2)',
                    'rgba(255, 206, 186, 0.2)',
                    'rgba(75, 192, 152, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 123, 1)',
                    'rgba(255, 99, 172, 1)',
                    'rgba(54, 162, 239, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(75, 192, 92, 1)',
                    'rgba(153, 102, 25, 1)',
                    'rgba(255, 99, 432, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</html>