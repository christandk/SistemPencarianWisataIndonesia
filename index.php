<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("FusionCharts_Gen.php");

$mnu=$_GET["menu"]; 
include"config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Indowisata</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
<link rel="stylesheet" href="css/style.css" type="text/css"/>
    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
     <div class="container">
   
    <!-- Carousel
    ================================================== -->
     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/header.jpg" alt="">
        </div>
      </div>
    </div><!-- /.carousel --><!-- /.carousel -->
     
       <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                      <li class="<?php if($mnu=="dashboard"){ echo"active";} ?>"><a href="?menu=dashboard">Beranda</a></li>
                      <li class="<?php if($mnu=="datawisata"){ echo"active";} ?>"><a href="?menu=datawisata">Data Wisata</a></li>
                      <li class="<?php if($mnu=="inputlokasi"){ echo"active";} ?>"><a href="?menu=inputlokasi">Wisata Terdekat</a></li>
                      <li class="<?php if($mnu=="rutewisata"){ echo"active";} ?>"><a href="?menu=rutewisata">Rute Wisata</a></li>
                      <li class="<?php if($mnu=="kuisioner"){ echo"active";} ?>"><a href="?menu=kuisioner">Kuisioner</a></li>
                      <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Grafik Penilaian <span class="caret"></span></a>
                      	<ul class="dropdown-menu" role="menu">
                            <li class="<?php if($mnu=="grafperkriteria"){ echo"active";} ?>">
                            <a href="?menu=grafperkriteria">Grafik Berdasarkan Kriteria</a></li>
                            <li class="<?php if($mnu=="grafikpenilaian"){ echo"active";} ?>">
                            <a href="?menu=grafikpenilaian">Grafik Berdasarkan Penilaian</a></li>
                        </ul>
                      </li>
                      </ul>
                    </li>
                  </ul>
          </div><!--/.nav-collapse -->
      </nav>
      <!------ content ---->
       <div class="isihalaman">
                 <?php  
				  if ($mnu=="dashboard"){ $judul="Beranda"; include"dashboard.php";}
				  else if($mnu==""){include "dashboard.php";}
				  else if($mnu=="inputlokasi"){include "lokasiawal.php";}
				  else if($mnu=="wisataterdekat"){include"wisata_terdekat.php";}
				  else if($mnu=="rutewisata"){include "rute.php";}
				  else if($mnu=="kuisioner"){include "kuisioner.php";}
				  else if($mnu=="datawisata"){ $judul="Data Lokasi Wisata";  include "datawisata.php";}
				  else if($mnu=="detailwisata"){include"detailwisata.php";}
				  else if($mnu=="pertanyaan"){include"pertanyaan.php";}
				  else if($mnu=="skorkelayakan"){include"skor_kelayakan.php";}
				  else if($mnu=="tambahwisata"){include"page/tambah_wisata.php";}
				  else if($mnu=="hasildijkstra"){include"page/wisata_terdekat.php";}
				  else if($mnu=="haversine"){include"haversine.php";}
				  else if($mnu=="grafikpenilaian"){include"grafikpenilaian.php";}
				   else if($mnu=="cetakkuisioner"){include"report/cetakkuisioner.php";}
				  else if($mnu=="grafperkriteria1"){include"grafikperkrit1.php";}
				  else if($mnu=="grafperkriteria"){include"grafikperkrit.php";}
				  else if($mnu=="user"){include"system/adminsystem/user.php";}
				  else if($mnu=="logout"){include"logout.php";}
				  else{	}
				?>
                </div>
      <!------- end content ---->
      <div class="footerweb">
        </br> 
        <p align="center">
        <small>&copy; 2014 - Indowisata </small> | <small>Universitas Kanjuruhan Malang  &reg; Chriestan Dwi K.</small></p>
        </br></br>
        </div>
         
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
     <script src="js/bootstrap-carousel.js"></script>
       <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete.js"></script>
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
         
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      });
    </script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
