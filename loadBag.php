<?php
include 'config/dbconfig.php';

session_start();
$user_input_new='';
function sessionStarted() {
    if (isset($_SESSION['user_admin']) ||  isset($_SESSION['user_id']) ) {

        return true;
    } else {

        return false;
    }
}
if(isset($_POST['submit'])){

    if(sessionStarted()){

        header("Location:./img/card.php");
        exit();

    }

    else{
        $message = "Niste prijavljeni! Prijavite se kako biste nastavili sa kupovinom";
        echo "<script type='text/javascript''>alert('$message');</script>";
        header("Location: ./korisnik/login.html" );
        exit();
    }
}
if(isset($_POST['komentarisi'])){

    if(sessionStarted()){

        $messagecomment = "Uspešno ste poslali komentar. Sačekajte da administratori odobre vaš komentar.";
        echo "<script type='text/javascript''>alert('$messagecomment');</script>";


    }

    else{

        header("Location: ./korisnik/login.html" );
        $messagecom = "Niste prijavljeni! Prijavite se kako biste nastavili sa komentarisanjem";
        echo "<script type='text/javascript''>alert('$messagecom');</script>";
        exit();

    }
}



// echo $_SESSION["user_admin"];

?>
<html>
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
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell|Oswald" rel="stylesheet">
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
  <script src="js/loadBags.js"></script>
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
            <?php if(sessionStarted()) { ?><li><a href="#">Prijavljeni ste kao <?php echo $_SESSION["korisnicko_ime"] ?> <span class="glyphicon glyphicon-user"></span></a></li><?php } ?>


        </ul><!--end of navbar items-->
      </div><!--end of myNavbar-->
    </div><!--end of container-fluid-->
  </nav><!--end of navbar-->
  <div id="wrappercontainer" style=" overflow: hidden; ">

      <div class="levo">


          <form method="post" style="margin-top: -25%;">
              <div style="height: auto;" class="kupidiv">
              <a href="img/card.php" style="text-decoration: none;"> <input type="submit" name="submit" value="Kupite proizvode" class="kupi responsive-width"></a>
          </form>

      </div>
      </div>

  <div class='desno' >
<?php
include_once("./config/dbconfig.php");

if(!isset($_GET['id'])) {
  header("Location:./index.php");
} else {
  $torbaID = $_GET['id'];
  $sql_select = "SELECT * FROM `stavke_torbe` WHERE ID=".$torbaID."";
  $result = mysqli_query($connection,$sql_select);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          echo "<div class='labela'>Naziv:&nbsp;</div><div class='sadrzaj'>". $row['Naziv']."</div><br/>";
          echo "<div><div id='loadslikaproizvoda'><img class='img-responsive' src=\"./img/".$row['Slika']."\" alt=\"".$row['Alt']."\"></div></div><br/>";
          echo "<div class='labela'>Opis:&nbsp;</div><div class='sadrzaj'> ".$row['Opis']."</div><br/>";
          echo "<div class='labela'>Cena:&nbsp;</div><div class='sadrzaj'> ".$row['Cena']."</div><br/>";
          echo "<div class='labela'>Dostupno: &nbsp;</div><div class='sadrzaj'>".$row['Kolicina']." kom.</div><br/>";

      }
  } else echo "Nema torbe sa tim ID-em u bazi";

}
 ?>


  </div>
  </div>

  <div class="commentsection" >

      <?php


    if($_POST) {
        $find = array('idiot', 'kreten', 'moron','retard','imbecil');
        $replace =array('<b>*cenzurisano*</b>', '<b>*cenzurisano*</b>', '<b>*cenzurisano*</b>','<b>*cenzurisano*</b>','<b>*cenzurisano*</b>');

        if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
            $user_input = $_POST['user_input'];
            $user_input_new = str_ireplace($find, $replace, $user_input);
        }

        $name = $_POST['name'];
        $sql_insert = "INSERT INTO komentari (ime, komentar) VALUES ( '".$name."' ,'".$user_input_new."')";
        mysqli_query($connection,$sql_insert);

    }



      ?>


      <h1 style="text-align: center;padding-top: 4%">Postavite komentar</h1>

      <form action="" method="post">

          <input type="text" name="name" placeholder="Nadimak..." class="komentar" style="font-size: 30px;margin-top: 0%;font-family: Calibri;font-weight: inherit" required><br/>
          <p style="margin-top: -1%;margin-bottom: 2%">Max. 50 karaktera</p>
          <textarea name="user_input" cols="30" rows="3" placeholder="Upišite komentar..." maxlength="250" class="komentar" style="font-size: 30px;margin-top: 0%;font-family: Calibri;font-weight: inherit" required></textarea><br/>
          <p style="margin-top: -1%;margin-bottom: 2%">Max. 250 karaktera</p>
          <input type="submit" name="komentarisi" value="Postavite komentar" style="font-size: 30px;margin-top: 0%;font-family: Calibri;font-weight: inherit" class="kupi responsive-width">

      </form>

      <hr style="border-bottom: 1px solid black;width: 70%;"/>
      <h1 style="text-decoration: underline;padding-top: 2%">Komentari korisnika</h1>
      <?php

      $sql="SELECT * FROM komentari WHERE odobren=1";
      $result=mysqli_query($connection,$sql)or die(mysqli_error($connection));
      if(mysqli_num_rows($result)>0){

          while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

              $id=$row['id'];
              $ime=$row['ime'];
              $komentar=$row['komentar'];
              $odobren=$row['odobren'];
              echo "<span class='col-lg-6' style='font-family: Calibri;font-size: 20px;width: 100%;'><b>$ime</b> je komentarisao/la: <b>$komentar</b>

</span> 
                  
                 
                  <br/><br/>
        ";
              echo "<br/>";
          }

      }

      ?>

  </div>


</div>
</div>
</div>




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
