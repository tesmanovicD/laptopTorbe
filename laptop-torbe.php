<?php
include_once("./config/dbconfig.php");
session_start();
function sessionStarted() {
    if (isset($_SESSION['user_admin']) ||  isset($_SESSION['user_id']) ) {
    return true;
  } else {
    return false;
  }
}

?>
<html lang="sr">
  <head>
    <title>Laptop Torbe - Online prodaja laptop torbi i rusaka | Katalog proizvoda</title>
  	<meta charset="utf-8">
  	<meta name="description" content="Laptop Torbe katalog sa proizvodima iz naše široke ponude asortimana raznih poznatih brendova">
  	<meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja,asus torbe, acer torbe,lenovo torbe,hp torbe,brendirane torbe">
  	<meta name="author" content="Laptop Torbe">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FACEBOOK OPEN GRAPH META TAGS -->
    <meta property="og:url" content="http://laptop-torbe.me/" />
    <meta property="og:title" content="Laptop Torbe - Katalog proizvoda" />
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
    <!-- LOCAL DATABASE OF LAPTOPS -->
    <script src="database.js"></script>
    <!-- SCRIPT FOR LOADING FROM DATABASE-->
    <script src="js/loadBags.js"></script>
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
    				<li class="active"><a href="laptop-torbe.php">Naši proizvodi &nbsp;&nbsp;<span class=" glyphicon glyphicon-briefcase"></span></a></li>
    				<li><a href="kontakt.php">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
    				<li><a href="onama.php">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
		<?php if(!sessionStarted()) { ?><li><a href="korisnik/registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
		<?php if(!sessionStarted()) { ?><li><a href="korisnik/login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
			<?php if(sessionStarted()) { ?><li><a href="korisnik/php/logout.php">Odjava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
                <?php if(sessionStarted()) { ?><li><a href="#">Prijavljeni ste kao <?php echo $_SESSION["korisnicko_ime"] ?> &nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>

                </ul><!--end of navbar items-->
    		</div><!--end of myNavbar-->
    	</div><!--end of container-fluid-->
    </nav><!--end of navbar-->

    <div class="row main">
      <div class="col-md-2 main-left">
        <ul class="list-group">
  			  <li class="list-group-item"  id="list-group-item-title">Izaberite marku</li>
          <li class="list-group-item"><a href="?brend=asus">Asus</a></li>
          <li class="list-group-item"><a href="?brend=hama">Hama</a></li>
          <li class="list-group-item"><a href="?brend=lenovo">Lenovo</a></li>
          <li class="list-group-item"><a href="?brend=spirit">Spirit</a></li>
  			  <li class="list-group-item"><a href="?brend=dell">Dell</a></li>
  			  <li class="list-group-item"><a href="?brend=hp">HP</a></li>
  			  <li class="list-group-item"><a href="?brend=targus">Targus</a></li>
        </ul><!--end of list-group-->
  		  <br/><br/><br/><br/>
  		  <div style="text-align: center;color: rgb(93,93,93)">
          <label style="font-family: Amatic SC;font-size: 17pt;margin-bottom: -6%">Izabrani brend:</label>
  			  <hr style="border-color: #929292"/>
  			  <div class="test" style="text-transform: capitalize;font-size: 17pt;margin-top: -6%"></div>
        </div>
  	  </div><!--end of main-left-->

      <div class="col-md-9 offset-1 main-right row">
        <!-- Dinamicki ispis iz lokalne "baze" podataka -->
      </div><!--end of main-right-->
    </div><!--end of main-->

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
    	</div><!--end of center-block-->
    </div><!--end of footer-->
  </body>

</html>

