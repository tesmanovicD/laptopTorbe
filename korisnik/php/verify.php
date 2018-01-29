<?php include_once("../../config/dbconfig.php"); ?>
<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="utf-8">
    <title>Registracija | Verifikacija</title>
    <meta charset="utf-8">
    <meta name="description" content="Laptop Torbe verifikacija naloga korisnika">
    <meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja">
    <meta name="author" content="Laptop Torbe">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FACEBOOK OPEN GRAPH META TAGS -->
    <meta property="og:url" content="http://laptop-torbe.me/" />
    <meta property="og:title" content="Laptop Torbe - Regstraciona Verifikacija" />
    <meta property="og:description" content="Laptop Torbe je online prodavnica koja pruza kupovinu laptop torbi i rusaka sirokog asortimana i raznih brendova po najpovoljnijim cenama" />
    <meta property="og:image" content="img/banner_laptop_torbe.png" />

    <!-- FONT SCHOOLBELL-->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell|Kalam" rel="stylesheet">
    <!-- FONT AWESOME FOR ICONS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- NORMALIZE.CSS GLITCH FIX -->
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <!-- PERSONAL - LOCAL CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <!-- BOOTSTRAP CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- JQUERY SCRIPT-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- JQUERY SLIM-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- POOPER JS FOR IMG SLIDER-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <!-- BOOTSTRAP SCRIPT-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- PERSONAL SCRIPT FILE-->
    <script src="../js/javascriptfile.js"></script>
</head>

<body style="text-align: center;background-color: #fff;">

<nav class="navbar navbar-inverse navbar-static-top">
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
        <li><a href="../laptop-torbe.php">Naši proizvodi &nbsp;&nbsp;<span class=" glyphicon glyphicon-briefcase"></span></a></li>
        <li><a href="../kontakt.php">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
        <li><a href="../onama.php">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
        <li class="active"><a href="registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>
      </ul><!--end of navbar items-->
    </div><!--end of myNavbar-->
  </div><!--end of container-fluid-->
</nav><!--end of navbar-->

    <!-- start wrap div -->
    <div id="wrap">
        <!-- start PHP code -->
        <?php
        global $connection;
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

        $email = mysql_escape_string($_GET['email']);
        $hash = mysql_escape_string($_GET['hash']);

        $sql_select = "SELECT Email, Lozinka, Status FROM korisnici WHERE Email='".$email."' AND Lozinka='".$hash."' AND Status='inactive'";

        $result = mysqli_query($connection, $sql_select);
        $match  = mysqli_num_rows($result);

        if($match > 0){
            // We have a match, activate the account
            $sql_update = "UPDATE korisnici SET Status='active' WHERE Email='".$email."' AND Lozinka='".$hash."' AND Status='inactive'";
            mysqli_query($connection, $sql_update);
            echo '<div class="statusmsg">Vas nalog je aktiviran, mozete se ulogovati </div>';
        }else{
            // No match -> invalid url or account has already been activated.
            echo '<div class="statusmsg">URL adresa je nevazeca ili ste vec aktivirali Vas nalog.</div>';
        }

    }else{
        // Invalid approach
        echo '<div class="statusmsg">Nevazeci pristup, molimo Vas koristite link za aktivaciju koji Vam je poslat na Vasu e-mail adresu.</div>';
    }

        ?>
        <!-- stop PHP Code -->


    </div>
    <!-- end wrap div -->
  </div>
</body>
</html>
