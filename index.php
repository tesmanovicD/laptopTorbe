<?php
session_start();
function sessionStarted() {
  if (isset($_SESSION['user_admin'])) {
    return true;
  } else {
    return false;
  }
}
// echo $_SESSION["user_admin"];
?>
<!DOCTYPE html>
<html lang="sr">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109530247-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-109530247-1');
	</script>

	<!-- Facebook Analytics tag -->
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '988563297942517',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v2.11'
	    });
	    FB.AppEvents.logPageView();
	  };
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<title>Laptop Torbe - Online prodaja laptop torbi i rusaka</title>
	<meta charset="utf-8">
	<meta name="description" content="Laptop Torbe je online prodavnica koja pruža kupovinu laptop torbi i ruksaka širokog asortimana i raznih brendova po najpovoljnijim cenama">
	<meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja">
	<meta name="author" content="Laptop Torbe">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FACEBOOK OPEN GRAPH META TAGS -->
	<meta property="fb:app_id" content="988563297942517" />
	<meta property="og:url" content="http://laptop-torbe.me/" />
	<meta property="og:title" content="Laptop Torbe - Online prodaja laptop torbi i ruksaka" />
	<meta property="og:description" content="Laptop Torbe je online prodavnica koja pruža kupovinu laptop torbi i ruksaka širokog asortimana i raznih brendova po najpovoljnijim cenama" />
	<meta property="og:image" content="img/banner_laptop_torbe.png" />
	<meta property="og:type" content="website" />

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
				<li class="active"><a href="index.php">Početna stranica &nbsp;&nbsp;<span class=" glyphicon glyphicon-home"></span></a></li>
				<li><a href="laptop-torbe.html">Naši proizvodi &nbsp;&nbsp;<span class=" glyphicon glyphicon-briefcase"></span></a></li>
				<li><a href="kontakt.html">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
				<li><a href="onama.html">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
        <?php if(!sessionStarted()) { ?><li><a href="korisnik/registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
        <?php if(!sessionStarted()) { ?><li><a href="korisnik/login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
				<?php if(sessionStarted()) { ?><li><a href="korisnik/php/logout.php">Odjava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
			</ul><!--end of navbar items-->
		</div><!--end of myNavbar-->
	</div><!--end of container-fluid-->
</nav><!--end of navbar-->




<section class="section-white">
	<div class="container">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!--Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
			</ol>

			<!--Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/avenue_slider.png" alt="SPIRIT Ranac Avenue - TTS 404840 do 15.6 inca" class="img-responsive">
					<div class="carousel-caption">
						<p class="sliderdescription">Laptop-ranac 15.6''<p/>
					</div>
				</div><!--end of item-->
				<div class="item">
					<img src="img/duotone_slider.png" alt="HP Torba Duotone Red za laptop do 15.6 inca - Y4T18AA  " class="img-responsive">
					<div class="carousel-caption">
						<p class="sliderdescription">Laptop-torba 15.6''<p/>
					</div>
				</div><!--end of item-->
				<div class="item">
					<img src="img/odyssey_slider.png" alt="HP 15.6 inca Odyssey Backpack (Crna) - L8J88AA" height="100px;" class="img-responsive">
					<div class="carousel-caption">
						<p class="sliderdescription">Laptop-ranac 15.6''</p>
					</div>
				</div><!--end of item-->
				<div class="item">
					<img src="img/value_slider.png" alt="HP Torba Value Top Load Case za laptop do 18 inca - QB683AA" class="img-responsive">
					<div class="carousel-caption">
						<p class="sliderdescription">Laptop-ranac 18''<p/>
					</div>
				</div><!--end of item-->
			</div><!--end of carousel-inner item group-->

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!--end of carousel-example-generic-->
	</div><!--end of container-->
</section><!--end of section-white-->


	<div id="aboutUs">
		<div class="container" >
			<div class="row">
				<div class="col-md-4 aboutUs-left">
					<img src="img/laptop-torbe-asortiman-brendova.png" id="fewbags" class="img-responsive" alt="Laptop torbe asortiman dostupnih brendova" >
				</div><!--end of aboutUs-left-->

				<div class="col-md-8 aboutUs-right">
					<h3 id="aboutUsTitle" >Laptop-Torbe d.o.o.</h3>
					<p class="aboutUsText">
						Laptop-Torbe d.o.o. je kompanija koja posluje na prostorima Bosne i Hercegovine, Crne Gore i Srbije.
						U svom planu ima i širenje na druga tržišta u okruženju.
						Titulu najvećeg trgovinskog lanca koji se bavi maloprodajom laptop torbi i ranaca dobili smo upravo uz vašu pomoć.
						<p class="aboutUsText">Uskoro naše poslovanje postaje i prekookeansko, jer smo uz pomoć naših partnera sa različitih kraja sveta uspeli da
					tržište rasprostranimo i podignemo na još veći nivo.</p>
					</p>
					<p id="aboutUsLink"><a href="kontakt.html">Kliknite ovde ako želite da stupite u kontakt sa nama.</a></p>
				</div><!--end of aboutUs-right-->
			</div><!--end of row-->
		</div><!--end of container-->
	</div><!--end of aboutUs-->



<!-- Product carousel-->

<div class="container-fluid" style="width: 70%; margin-top: 3%;" >
	<div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/asus_laptop_torba_rog_ranger.png" class="img-responsive" alt="ASUS laptop torba ROG Ranger Messenger do 15.6 inca"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Asus torba</h2>
							<p class="ProductCarouselDescription">Za laptopove do 15.6''</p>
							<p class="ProductCarouselDescription">ROG Ranger Messenger</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">9,990 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->
			<div class="item">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/dell_ranac_alienware_vindicator.png"  class="img-responsive" alt="DELL Ranac Alienware Vindicator za laptop do 17 inca"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Dell ranac</h2>
							<p class="ProductCarouselDescription">Ranac za laptopove veličine 17''</p>
							<p class="ProductCarouselDescription">Alienware Vindicator</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">17,990 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->
			<div class="item">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/lenovo_y_gaming_armored.png" class="img-responsive" alt="LENOVO Y Gaming Armored - GX40L16533 Ranac za laptop, do 17 inca, Crna"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Lenovo ranac</h2>
							<p class="ProductCarouselDescription">Ranac za laptopove veličine 17''</p>
							<p class="ProductCarouselDescription">Y Gaming Armored</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">8,990 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->
			<div class="item">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/hama_tortuga.png" class="img-responsive" alt="HAMA Ranac Tortuga za laptop do 17.3 inca (Crna) - 101525"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Hama ranac</h2>
							<p class="ProductCarouselDescription">Ranac za laptopove veličine 17.3''</p>
							<p class="ProductCarouselDescription">Tortuga</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">3,190 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->

			<div class="item">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/dell_torba_topload.png" class="img-responsive" alt="DELL Torba Essential Topload - NOT10601"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Dell torba</h2>
							<p class="ProductCarouselDescription">Torba za laptopove veličine 15.6''</p>
							<p class="ProductCarouselDescription">Essential Topload</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">2,190 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->
			<div class="item">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"><img src="img/targus_cn01.jpg" class="img-responsive" alt="TARGUS Torba za notebook 16 inca - CN01"></div>
						<div class="col-md-9">
							<h2 class="ProductCarouselTitles">Targus torba</h2>
							<p class="ProductCarouselDescription">Torba za laptopove veličine 16''</p>
							<p class="ProductCarouselDescription">Torba za notebook</p>
							<p class="ProductCarouselLink"><a href="laptop-torbe.html">Pogledajte sve proizvode</a> </p>
							<p class="ProductCarouselPrice">3,990 RSD</p>
						</div>
					</div><!--end of row-->
				</div><!--end of container-fluid-->
			</div><!--end of item-->
		</div><!--end of carousel-inner item group-->

		<div class="controls">
			<ul class="nav">
				<li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"><img src="img/asus_laptop_torba_rog_ranger.png" height="50px" alt="ASUS laptop torba ROG Ranger Messenger do 15.6 inca"><small>Asus torba</small></a></li>
				<li data-target="#custom_carousel" data-slide-to="1"><a href="#"><img src="img/dell_ranac_alienware_vindicator.png"   height="50px" alt="DELL Ranac Alienware Vindicator za laptop do 17 inca"><small>Dell ranac</small></a></li>
				<li data-target="#custom_carousel" data-slide-to="2"><a href="#"><img src="img/lenovo_y_gaming_armored.png"   height="50px" alt="LENOVO Y Gaming Armored - GX40L16533 Ranac za laptop, do 17 inca, Crna"><small>Lenovo ranac</small></a></li>
				<li data-target="#custom_carousel" data-slide-to="3"><a href="#"><img src="img/hama_tortuga.png"  height="50px" alt="HAMA Ranac Tortuga za laptop do 17.3 inca (Crna) - 101525"><small>Hama ranac</small></a></li>
				<li data-target="#custom_carousel" data-slide-to="4"><a href="#"><img src="img/dell_torba_topload.png"  height="50px" alt="DELL Torba Essential Topload - NOT10601a"><small>Dell torba</small></a></li>
				<li data-target="#custom_carousel" data-slide-to="5"><a href="#"><img src="img/targus_cn01.jpg"  height="50px" alt="TARGUS Torba za notebook 16 inca - CN01"><small>Targus torba</small></a></li>
			</ul>
		</div><!--end of controls-->
	</div><!--end of custom_carousel-->
</div><!--end of container-fluid-->

<!-- Product carousel end-->

<div class="row site-banners">
	<h3 class="text-center">Prijatelji sajta</h3>
	<div class="col-md-offset-2 col-md-2">
		<a href="http://vinarijasubotica-com.stackstaging.com/index.php" title="Vinarija Subotica">
			<img src="img/banner_vinarija_subotica.png" class="img-responsive" alt="Baner Vinarije Subotica"/>
		</a>
	</div>
	<div class="col-md-offset-1 col-md-2">
		<a href="http://salate.me/" title="YUMMY SALADS">
			<img src="img/banner_yummy_salads.png" class="img-responsive" alt="Baner Yummy Salads"/>
		</a>
	</div>
	<div class="col-md-offset-1 col-md-2">
		<a href="http://cugni.me/" title="CUGNI ME">
			<img src="img/banner_cugnime.png" class="img-responsive" alt="Baner Cugni.me"/>
		</a>
	</div>

</div>


<div id="footer">
	<div class="text-center center-block">
		<h4 style="font-family: Reenie Beanie;font-size:20px;"> Laptop-Torbe.rs</h4>
		<h4 style="font-family: Amatic SC;font-size:25px;">ŠKOLSKI PROJEKAT</h4>
		<a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-3x social"></i></a>
		<a href="https://twitter.com"><i class="fa fa-twitter-square fa-3x social"></i></a>
		<a href="https://instagram.com"><i class="fa fa-instagram fa-3x social"></i></a>
	</div>
</div><!--end of footer-->

</body>
</html>
