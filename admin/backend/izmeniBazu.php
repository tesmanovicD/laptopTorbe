<?php
  include_once("../../config/dbconfig.php");


  if(isset($_POST['tip_podatka'])) {
    $tip_podatka = $_POST['tip_podatka'];

    if ($tip_podatka == 'izmena_torbe') {
      if (empty($_POST['naziv']) || empty($_POST['cena']) || empty($_POST['alt']) || empty($_POST['link']) || empty($_POST['kolicina']) || empty($_POST['opis']) || empty($_POST['kategorija']))
      {
        $sql_update = "UPDATE stavke_torbe SET
        `Naziv` = \"".$_POST['naziv']."\",
        `Opis` = \"".$_POST['opis']."\",
        `Cena` = ".$_POST['cena'].",
        `Slika` = \"glupost\",
        `Alt` = \"".$_POST['alt']."\",
        `Link` = \"".$_POST['link']."\",
        `Kategorija` = \"".$_POST['kategorija']."\",
        `Kolicina` = ".$_POST['kolicina']."
        WHERE `ID` = ".$_POST['id']."";
        if(mysqli_query($connection, $sql_update)) {
          echo "Uspesno ste izmenili torbu ID: ".$_POST['id'];
        } else {
          echo "Greska";
        }


      }
    } else if ($tip_podatka == 'izmena_admina') {
      if (empty($_POST['id']) || empty($_POST['email']))
      {
        $sql_select = "SELECT * FROM `korisnici` WHERE `ID` = ".$_POST['id']." AND `Admin` = 1";
        $result = mysqli_query($connection, $sql_select);

        if (mysqli_num_rows($result) > 0) {
          //ukloni admina
          $sql_update = "UPDATE `korisnici` SET `Admin` = 0 WHERE `ID` = ".$_POST['id']."";
          if(mysqli_query($connection, $sql_update)) {
            echo "Uspesno ste uklonili admina korisniku sa ID-em:: ".$_POST['id'];
          } else {
            echo "Greska";
          }
        } else {
          //dodaj admina
          $sql_update = "UPDATE `korisnici` SET `Admin` = 1 WHERE `ID` = ".$_POST['id']."";
          if(mysqli_query($connection, $sql_update)) {
            echo "Uspesno ste dodelili admina korisniku sa ID-em: ".$_POST['id'];
          } else {
            echo "Greska";
          }
        }
      }
    }
  }

  if (!empty($_POST['ime'])) {
    if ($_POST['ime'] == 'torba') {
      echo json_encode(lista_torbi());
    } else if ($_POST['ime'] == 'brend') {

    } else if ($_POST['ime'] == 'korisnik') {
      echo json_encode(lista_korisnika());
    } else if ($_POST['ime'] == 'porudzbine') {
      echo json_encode(lista_porudzbina());
    } else if ($_POST['ime'] == 'promeniStatus') {
      echo promeniStatus($_POST['status']);
    } else {
      echo "Nepostojece!";
    }
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

  function lista_korisnika()
  {
      global $connection;
      $sql_select = "SELECT * FROM `korisnici`";
      $result = mysqli_query($connection, $sql_select);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $korisnici[] = $row;
          }
          return $korisnici;
      } else return $korisnici[] = "Nema korisnika u bazi";
  }

  function lista_porudzbina() {
    global $connection;
    $sql_select = "SELECT DISTINCT`ID_Porudzbine`, `Poslato` FROM porudzbine GROUP BY `ID_Porudzbine`";
    $result = mysqli_query($connection, $sql_select);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $porudzbine[] = $row;
      }
      return $porudzbine;
    } else return $porudzbine[] = "Nema porudzbina u bazi koje nisu obradjene";
  }

  function promeniStatus($a,$b = "undefined") {
    global $connection;

    if ($b == "undefined") {
      $sql_update = "UPDATE `porudzbine` SET `Poslato` = 1 WHERE `ID` = $a";
      $result = mysqli_query($connection, $sql_update);

      if($result) {
        echo "Uspesno promenjen status na 'Poslato' ";
      } else {
        echo "Doslo je do greske!";
      }
    }
  }

 ?>
