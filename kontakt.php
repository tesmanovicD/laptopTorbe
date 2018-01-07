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
		<title>Laptop Torbe - Online prodaja laptop torbi i rusaka | Kontakt podaci</title>
		<meta charset="utf-8">
		<meta name="description" content="Laptop Torbe kontakt podaci za saradnju i sva tehnicka pitanja korisnika">
		<meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja">
		<meta name="author" content="Laptop Torbe">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- FACEBOOK OPEN GRAPH META TAGS -->
		<meta property="og:url" content="http://laptop-torbe.me/" />
		<meta property="og:title" content="Laptop Torbe - Kontakt stranica" />
		<meta property="og:description" content="Laptop Torbe je online prodavnica koja pruza kupovinu laptop torbi i rusaka sirokog asortimana i raznih brendova po najpovoljnijim cenama" />
		<meta property="og:image" content="img/banner_laptop_torbe.png" />

	  <!-- FONT SCHOOLBELL-->
	  <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell" rel="stylesheet">
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
	          <li class="active"><a href="kontakt.php">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
	          <li><a href="onama.php">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
                <?php if(!sessionStarted()) { ?><li><a href="korisnik/registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
                <?php if(!sessionStarted()) { ?><li><a href="korisnik/login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
                <?php if(sessionStarted()) { ?><li><a href="korisnik/php/logout.php">Odjava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
                <?php if(sessionStarted()) { ?><li><a href="#">Prijavljeni ste kao Milos &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>


            </ul><!--end of navbar items-->
	      </div><!--end of myNavbar-->
		   </div><!--end of container-fluid-->
		</nav><!--end of navbar-->


		<div class="contactcontainer">
			<div class="jumbotron jumbotron-sm" style="background-color:#fff;color:#292929;height: 100px;">
		  	<div class="row">
		    	<h2 class="h2" style="margin-top:-2%;text-align: center;font-family: 'Amatic SC', cursive;font-size: 50pt;">
						Pronađite nas
					</h2>
		  	</div>
			</div><!--end of jumbotron-->
		</div><!--end of contactcontainer-->
	<div id="infocontainer">
	    <div class="row">
	      <div class="col-sm-6">
	        <div class="well">
	          <h4>Ulica: Marka Oreškovića 16 <span class="glyphicon glyphicon-pushpin" style="margin-left: 5%;"></span></h4>
	          <hr/>
	          <h4>Kontaktirajte nas na e-mail: <span class="glyphicon glyphicon-envelope" style="margin-left: 5%;"></span></h4>
	          <p>danites007@gmail.com</p>
	          <p>miilosmijatovic@gmail.com</p>
	          <h4>Osnivači:  <span class="glyphicon glyphicon-briefcase" style="margin-left: 5%;"></span></h4>
	          <p>Tešmanović Daniel</p>
	          <p>Miloš Mijatović</p>
	          <h4>Brojevi telefona:  <span class="glyphicon glyphicon-phone-alt" style="margin-left: 5%;"></span></h4>
	          <p>064/** ** ***</p>
	          <p>062/** ** ***</p>
	        </div><!--end of well-->
	      </div>
	      <div class="col-sm-6" class="img-responsive">
	        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.959911982619!2d19.657794715642922!3d46.09177647911339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366d6d299c495%3A0x8d53aa81cc13e76!2z0JzQsNGA0LrQsCDQntGA0LXRiNC60L7QstC40ZvQsCwg0KHRg9Cx0L7RgtC40YbQsA!5e0!3m2!1ssr!2srs!4v1497301842060" width="100%" height="390" frameborder="0" style="border:0; border-radius: 10px;"  allowfullscreen></iframe>
				</div>
	    </div>
		</div><!--end of infocontainer-->
		<hr/>

		<h1>
			<p class="typewrite" id="animatedText" data-period="2000" data-type='[ "Nudimo veliki izbor, odličan kvalitet i svetski poznate brendove!" ]'>
		  	<span class="wrap"></span>
		  </p>
		</h1>


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
