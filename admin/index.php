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
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <!-- PERSONAL - LOCAL CSS -->
      <link rel="stylesheet" type="text/css" href="../css/main.css">
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
      <script src="js/javascriptfile.js"></script>
  </head>
  <body style="text-align: center; font-family:'Amatic SC';background-color: #3c4348;color: white">
  <h1>Admin panel</h1>
<hr/>

<p style="font-size: 35px;">Broj registrovanih korisnika: <?php brojKorisnika() ?>
<p style="font-size: 35px;">Broj laptop torbi u bazi: <?php brojLaptopTorbi() ?>



<form onclick="dodajBrend()" >
  <input type="text" id="naziv" name="naziv" placeholder="Naziv" class="dodavanje" />

    <br/>
  <input type="number" id="cena" name="cena" placeholder="Cena" class="dodavanje"/>
    <br/>

  <input type="text" id="alt" name="alt" placeholder="Alt" class="dodavanje"/>
    <br/>
  <input type="url" id="link" name="link" placeholder="Link" class="dodavanje"/>
    <br/>

  <input type="number" id="kolicina" name="kolicina" placeholder="Kolicina" class="dodavanje"/>
    <br/>
    <textarea name="opis" id="opis" rows="8" cols="80" placeholder="Opis" class="dodavanje"></textarea>
<br/>


</form>

<?php
$table_name = "stavke_torbe";
$column_name = "Kategorija";

echo "<select name=\"$column_name\" class=\"dodavanje\" style='color: #626262';'>";
$sqlSelect = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
$result = mysqli_query($connection, $sqlSelect);

$row = mysqli_fetch_array($result);
$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

foreach($enumList as $value)
    echo "<option value=\"$value\">$value</option >";

echo "</select>";

 ?>
<script type="text/javascript">

  function dodajBrend() {
    $.ajax({
    url: 'dodajBrend.php',
    dataType: 'json',
    type: 'post',
    contentType: 'application/json',
    data: JSON.stringify(
      {
       "Naziv": $('#first-name').val(),
       "Opis": $('#last-name').val(),
       "Cena": $('#last-name').val(),
       "Slika": $('#last-name').val(),
       "Alt": $('#last-name').val(),
       "Link": $('#last-name').val(),
       "Kategorija": $('#last-name').val(),
       "Kolicina": $('#last-name').val(),

      }
    ),
    processData: false,
    success: function( data, textStatus, jQxhr ){
        $('#response pre').html( JSON.stringify( data ) );
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
    });
  }

</script>
  </body>
</html>

<?php } ?>
