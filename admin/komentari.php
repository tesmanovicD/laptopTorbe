<?php
session_start();
include_once("../config/dbconfig.php");
include_once("functions.php");
if(!isset($_SESSION['user_id']) || $_SESSION['user_admin'] == 0 ) {
    header("refresh: 2; url=../index.php");
} else {



    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title></title>
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
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell|Kalam" rel="stylesheet">
        <!-- FONT AWESOME FOR ICONS -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- NORMALIZE.CSS GLITCH FIX -->
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <!-- PERSONAL - LOCAL CSS -->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!-- BOOTSTRAP CSS-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

        <!-- JQUERY SLIM-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <!-- POOPER JS FOR IMG SLIDER-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <!-- BOOTSTRAP SCRIPT-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- PERSONAL SCRIPT FILE-->
        <!-- JQUERY SCRIPT-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/javascriptfile.js"></script>
    </head>
    <body style="text-align: center; font-family:'Amatic SC';background-color: #3c4348;color: white;font-size: 50px;">
    <h1 style="font-weight: bold">Odobravanje komentara</h1>
    <hr/>

    <?php

    $sql="SELECT * FROM komentari WHERE odobren=0";
    $result=mysqli_query($connection,$sql)or die(mysqli_error($connection));
    if(mysqli_num_rows($result)>0){

        while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

            $id=$row['id'];
            $ime=$row['ime'];
            $komentar=$row['komentar'];
            $odobren=$row['odobren'];
            echo "<span class='col-lg-6' style='font-family: Calibri;font-size: 30px;width: 100%;padding-bottom: 2%;'>
<b>$ime</b> je komentarisao/la: <b>$komentar</b>

<input type=\"button\" onclick=\"location.href='approvedcomment.php?&id=$id';\" value=\"✔\" class='btn btn-success' 
 style='margin-left: 2%;padding-left:2%;padding-right: 2%; font-size: 30px;font-weight: bold;'/>
 </span> 
 
<hr style=\" border: 0;
  clear:both;
  display:block;
  width: 70%;               
  background-color:#B0B0B0;
  height: 1px;\"/>

  ";


        }

    }
else{
        echo"nema komentara koji čekaju odobrenje";
}
    ?>



    </body>
</html>

<?php }
?>