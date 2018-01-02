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
  <body style="text-align: center; font-family:'Amatic SC';background-color: #3c4348;color: white">
  <h1>Admin panel</h1>
<hr/>

<p style="font-size: 35px;">Broj registrovanih korisnika: <?php brojKorisnika() ?></p>
<p style="font-size: 35px;">Broj laptop torbi u bazi: <?php brojLaptopTorbi() ?></p>
<button onclick="document.getElementById('dodajTorbu').hidden = '';" class="btn btn-primary">Dodaj laptop torbu</button>
<button type="button" name="izmeniTorbu" onclick="izmeniBazu('torba')" class="btn btn-primary">Izmeni torbu</button>

<div class="container">
  <div id="dodajTorbu" hidden="hidden">
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

  <!-- ISCITAVANJE KATEGORIJA IZ ENUMA -->
  <?php
  $table_name = "stavke_torbe";
  $column_name = "Kategorija";

  echo "<select name=\"$column_name\" class=\"dodavanje\" id=\"kategorija\" style='color: #626262';'>";
  $sqlSelect = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
      WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
  $result = mysqli_query($connection, $sqlSelect);

  $row = mysqli_fetch_array($result);
  $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

  foreach($enumList as $value)
      echo "<option value=\"$value\">$value</option >";

  echo "</select>";

   ?>

  <button onClick="dodajTorbu()">TEST</button>
  <input type="reset" name="otkazi" value="Otkazi">

  </div><!--end of dodaj_torbu-->

  <table id="torbe" hidden="hidden" class="table table-bordered">
      <thead class="thead-light">
        <tr>
           <th scope="col">&nbsp;ID&nbsp;</th>
           <th scope="col">&nbsp;Naziv&nbsp;</th>
           <th scope="col">Opis</th>
           <th scope="col">Cena</th>
           <th scope="col">Slika</th>
           <th scope="col">Kategorija</th>
           <th scope="col">Kolicina</th>
           <th scope="col">Link</th>
           <th scope="col">Opis</th>
         </tr>
      </thead>
       <tbody id="tbody">

       </tbody>
   </table>

</div><!--end of container-->


<script type="text/javascript">

var lista_torbi=[];

  function dodajTorbu() {
    $.ajax({
        data: { naziv: $('#naziv').val(), opis: $('#opis').val(), cena: $('#cena').val(), slika: $('#slika').val(),
              alt: $('#alt').val(), link: $('#link').val(), kategorija: $('#kategorija').val(), kolicina: $('#kolicina').val() },
        type: "POST",
        url: "backend/dodajTorbu.php",
        success: function(data){
          alert(data);
        }
    });
  }

  function izmeniBazu(ime) {
    operacija = ime;
    $.ajax({
      data: { ime: ime },
      type: "POST",
      url: "backend/izmeniBazu.php",
      success: function(data) {
        switch (operacija) {
          case "torba":
            lista_torbi = [];
            tempTorbe= JSON.parse(data);
            for (var i = 0; i < tempTorbe.length; i++) {
              lista_torbi.push({
              ID: tempTorbe[i].ID,
              Naziv: tempTorbe[i].Naziv,
              Opis: tempTorbe[i].Opis,
              Cena: tempTorbe[i].Cena,
              Slika: tempTorbe[i].Slika,
              Alt: tempTorbe[i].Alt,
              Link: tempTorbe[i].Link,
              Kategorija: tempTorbe[i].Kategorija,
              Kolicina: tempTorbe[i].Kolicina
              });
            }
            console.log(lista_torbi);
            torbeAppend();
            break;

          case "brend":
            // userList = [];
            // tempUser= JSON.parse(data);
            // for (var i = 0; i < tempUser.length; i++) {
            //   userList.push({
            //   username: tempUser[i].username,
            //   user_id: tempUser[i].user_id
            //   });
            // }
            break;
        }
      }
    })
  }

  function torbeAppend() {
    document.getElementById("dodajTorbu").hidden = "hidden";
    document.getElementById("torbe").hidden = "";
    $("#torbe .dynamicWrite").empty();
    let tr;
    for (var i = 0; i < lista_torbi.length; i++) {
        tr = $('<tr class="dynamicWrite" scope="row"/>');
        tr.append("<td class='tabledata'><a>" + lista_torbi[i].ID + "</a></td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Naziv + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Opis + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Cena + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Slika + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Kategorija + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Kolicina + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Link + "</td>");
        tr.append("<td class='tabledata'>" + lista_torbi[i].Alt + "</td>");
        $('#torbe').append(tr);
    }
  }

</script>
  </body>
</html>

<?php } ?>
