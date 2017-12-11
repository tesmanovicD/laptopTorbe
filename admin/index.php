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
  </head>
  <body>
Admin panel

<p>Broj Reg Korisnika: <?php brojKorisnika() ?>
<p>Broj Laptop  Torbi u bazi: <?php brojLaptopTorbi() ?>



<form onclick="dodajBrend()">
  <input type="text" id="naziv" name="naziv" placeholder="Naziv" />
  <textarea name="opis" id="opis" rows="8" cols="80" placeholder="Opis"></textarea>
  <input type="number" id="cena" name="cena" placeholder="Cena" />

  <input type="text" id="alt" name="alt" placeholder="Alt" />
  <input type="url" id="link" name="link" placeholder="Link" />

  <input type="number" id="kolicina" name="kolicina" placeholder="Kolicina" />

</form>

<?php
$table_name = "stavke_torbe";
$column_name = "Kategorija";

echo "<select name=\"$column_name\">";
$sqlSelect = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
$result = mysqli_query($connection, $sqlSelect);

$row = mysqli_fetch_array($result);
$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

foreach($enumList as $value)
    echo "<option value=\"$value\">$value</option>";

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
