<?php
session_start();
function sessionStarted() {
    if (isset($_SESSION['user_admin']) ||  isset($_SESSION['user_id']) ) {
        return true;
    } else {
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="sr">
  <head>
    <title>Laptop Torbe - Online prodaja laptop torbi i rusaka | O nama</title>
    <meta charset="utf-8">
    <meta name="description" content="Laptop Torbe podaci o osnivačima sajta i njihovi kontakt podaci">
    <meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja">
    <meta name="author" content="Laptop Torbe">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FACEBOOK OPEN GRAPH META TAGS -->
    <meta property="og:url" content="http://laptop-torbe.me/" />
    <meta property="og:title" content="Laptop Torbe - O nama" />
    <meta property="og:description" content="Laptop Torbe je online prodavnica koja pruza kupovinu laptop torbi i rusaka sirokog asortimana i raznih brendova po najpovoljnijim cenama" />
    <meta property="og:image" content="img/banner_laptop_torbe.png" />

    <!-- FONT SCHOOLBELL-->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell|Fjalla+One|Overlock" rel="stylesheet">
    <!-- BOOTSTRAP CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONT AWESOME FOR ICONS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- NORMALIZE.CSS GLITCH FIX -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- PERSONAL - LOCAL CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- JQUERY SCRIPT-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- JQUERY SLIM-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- POOPER JS FOR IMG SLIDER-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <!-- BOOTSTRAP SCRIPT-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- PERSONAL SCRIPT FILE-->
    <script src="js/javascriptfile.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-static-top" >
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Laptop-Torbe.me</a>
        </div><!--end of navbar-header-->

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="itemscentered">
          <li><a href="/">Početna stranica &nbsp;&nbsp;<span class=" glyphicon glyphicon-home"></span></a></li>
          <li><a href="laptop-torbe.php">Naši proizvodi &nbsp;&nbsp;<span class=" glyphicon glyphicon-briefcase"></span></a></li>
          <li><a href="kontakt.php">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
          <li class="active"><a href="onama.php">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
            <?php if(!sessionStarted()) { ?><li><a href="korisnik/registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
            <?php if(!sessionStarted()) { ?><li><a href="korisnik/login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
            <?php if(sessionStarted()) { ?><li><a href="korisnik/php/logout.php">Odjava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
            <?php if(sessionStarted()) { ?><li><a href="#">Prijavljeni ste kao Milos &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>

        </ul><!--end of navbar items-->
      </div><!--end of myNavbar-->
      </div><!--end of container-fluid-->
    </nav><!--end of navbar-->

    <div class="container bootstrap snippet">
      <section id="team" class="white-bg padding-top-bottom">
        <div class="container bootstrap snippet">
          <h1 class="section-title text-center page-title">Osnivači</h1>
            <div class="row member-content">
              <div class="col-sm-3 col-sm-offset-1 member-thumb  fade-right in">
                <img class="img-responsive img-center img-thumbnail img-circle" src="img/daniel-profilna-slika.jpg" alt="Daniel Tešmanović osnivač sajta">
                <p class="member-title">Daniel Tešmanović</p>
              </div><!--end of member-thumb-->
              <div class="col-sm-7 member-quote">
                <div class="details">
                  <p class="quotes">Obsessed is a word the lazy use to describe the dedicated.</p>
                  <ul class="social-content" style="margin-left: 30%">
                    <li><a href="https://www.facebook.com/daniel.tesmanovic"><i class="fa fa-facebook fa-fw"></i></a></li>
                    <li><a href="https://github.com/tesmanovicD"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                  </ul>
                </div><!--end of details-->
              </div><!--end of member-quote-->
            </div><!--end of member-content-->

            <div class="row member-content right">
              <div class="col-sm-3 col-sm-push-8 member-thumb">
                <img class="img-responsive img-center img-thumbnail img-circle" src="img/milos-profilna-slika.jpg" alt="Miloš Mijatović osnivač sajta">
                <p class="member-title">Miloš Mijatović</p>
              </div><!--end of member-thumb-->
              <div class="col-sm-7 col-sm-pull-2 member-quote">
                <div class="details">
                  <p class="quotes">Everything you’ve ever wanted is on the other side of fear.</p>
                  <ul class="social-content" style="margin-left: 30%">
                    <li><a href="https://www.facebook.com/losMi.M"><i class="fa fa-facebook fa-fw"></i></a></li>
                    <li><a href="https://github.com/mijatovicM/"><i class="fa fa-github" aria-hidden="true"></i>
                    </a></li>
                  </ul>
                </div><!--end of details-->
              </div><!--end of member-quote-->
            </div><!--end of member-content-->
        </div><!--end of container-->
      </section><!--end of sectio nteam-->
    </div><!--end of container-->
    <br/><br/><br/>

    <div class="panel panel-primary" style="width: 40%;margin-left: 30%;">
      <div class="panel-heading" style="background-color: #008181"></div>
      <div class="panel-body">
        Sajt je nastao u okviru školskog projekta Visoke tehničke škole strukovnih studija u Subotici.
          Svaki proizvod sa našeg sajta je vlasništvo Gigatrona, stoga se klikom na bilo koji od proizvoda vrši redirect na njihov
          sajt. Zahvaljujemo se Gigatronu na dozvoli da koristimo njihov sadržaj.
      </div><!--end of panel-body-->
    </div><!--end of panel-->

    <div class="row">
    <img class="col-xs-12 col-sm-offset-5 col-sm-2" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=https%3A%2F%2Fufile.io%2Fvxnug&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />
    </div>
    <div id="footer">
      <div class="text-center center-block">
        <h4 style="font-family: Reenie Beanie;font-size:20px;"> Laptop-Torbe.rs </h4>
        <h4 style="font-family: Amatic SC;font-size:25px;">ŠKOLSKI PROJEKAT</h4>
        <a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-3x social"></i></a>
        <a href="https://twitter.com"><i class="fa fa-twitter-square fa-3x social"></i></a>
        <a href="https://instagram.com"><i class="fa fa-instagram fa-3x social"></i></a>
      </div>
    </div><!--end of footer-->
  </body>
</html>
