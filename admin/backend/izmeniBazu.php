<?php
  include_once("../../config/dbconfig.php");


  if (!empty($_POST['ime'])) {
    if ($_POST['ime'] == 'torba') {
      echo json_encode(lista_torbi());
    } else if ($_POST['ime'] == 'brend') {

    } else {
      echo "Nepostojece!";
    }
  } else {
    echo "Greska!";
  }

  function lista_torbi()
  {
      global $connection;
      $sql_select = "SELECT * FROM `stavke_torbe`";
      $result = mysqli_query($connection, $sql_select);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $torbe[] = $row;
          }
          return $torbe;
      } else return $torbe[] = "Nema torbi u bazi";
  }



 ?>
