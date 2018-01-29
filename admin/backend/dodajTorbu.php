<?php

  include_once("../../config/dbconfig.php");

  if(proveriPodatke()) {
    // var_dump($_FILES['file']['name']);
    // echo $_FILES['file']['name'];
    // uploadSlike();
    $sql_insert = "INSERT INTO stavke_torbe (`Naziv`, `Opis`, `Cena`, `Slika`, `Alt`, `Link`, `Kategorija`, `Kolicina`) VALUES ('".$_POST['naziv']."','".$_POST['opis']."','".$_POST['cena']."','test','".$_POST['alt']."','".$_POST['link']."','".$_POST['kategorija']."','".$_POST['kolicina']."')";
    mysqli_query($connection, $sql_insert);
    echo "Uspesno poslato";
  } else {
    echo "Nije dobro";
  }



function proveriPodatke() {
  if (empty($_POST['naziv']) || empty($_POST['cena']) || empty($_POST['alt']) || empty($_POST['link']) || empty($_POST['kolicina']) || empty($_POST['opis']) || empty($_POST['kategorija']))
  {
    return false;
  } else {
    return true;
  }
}

function uploadSlike() {
  $target_dir = "../../img/";
  $target_file = $target_dir . basename($_FILES['file']['name']);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["FileToUpload"])) {
      $check = getimagesize($_FILES["file"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
}

 ?>
