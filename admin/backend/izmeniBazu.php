<?php
  include_once("../../config/dbconfig.php");

  if(isset($_POST['tip_podatka'])) {
    $tip_podatka = $_POST['tip_podatka'];

    if ($tip_podatka == 'izmena_torbe') {
      if (empty($_POST['naziv']) || empty($_POST['cena']) || empty($_POST['alt']) || empty($_POST['link']) || empty($_POST['kolicina']) || empty($_POST['opis']) || empty($_POST['kategorija']))
      {
        $slika = $_FILES['slikaTorbe']['name'];
        if ($slika != '') {
          if(!uploadSlike()) {
            exit();
          }
          $sql_update = "UPDATE stavke_torbe SET
          `Naziv` = \"".$_POST['nazivTorbe']."\",
          `Opis` = \"".$_POST['opisTorbe']."\",
          `Cena` = ".$_POST['cenaTorbe'].",
          `Slika` = \"".$slika."\",
          `Alt` = \"".$_POST['altTorbe']."\",
          `Link` = \"".$_POST['linkTorbe']."\",
          `Kategorija` = \"".$_POST['kategorijaTorbe']."\",
          `Kolicina` = ".$_POST['kolicinaTorbe']."
          WHERE `ID` = ".$_POST['idTorbe']."";
        } else {
          $sql_update = "UPDATE stavke_torbe SET
          `Naziv` = \"".$_POST['nazivTorbe']."\",
          `Opis` = \"".$_POST['opisTorbe']."\",
          `Cena` = ".$_POST['cenaTorbe'].",
          `Alt` = \"".$_POST['altTorbe']."\",
          `Link` = \"".$_POST['linkTorbe']."\",
          `Kategorija` = \"".$_POST['kategorijaTorbe']."\",
          `Kolicina` = ".$_POST['kolicinaTorbe']."
          WHERE `ID` = ".$_POST['idTorbe']."";
        }
        if(mysqli_query($connection, $sql_update)) {
          echo "Uspesno ste izmenili torbu ID: ".$_POST['idTorbe'];
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
    $sql_select = "SELECT DISTINCT`ID_Porudzbine`, `Poslato` FROM porudzbine GROUP BY `ID_Porudzbine` ORDER BY Datum_Kupovine DESC";
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

  function uploadSlike() {
    $sourcePath = $_FILES['slikaTorbe']['tmp_name'];       // Storing source path of the file in a variable
    $targetPath = "../../img/".$_FILES['slikaTorbe']['name']; // Target path where file is to be stored
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetPath,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["slikaTorbe"])) {
        $check = getimagesize($_FILES["slikaTorbe"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Fajl koji ste uploadali nije slika!.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetPath)) {
        echo "Slika sa ovim imenom vec postoji!";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
      move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
      return true;
    } else return false;

  }

 ?>
