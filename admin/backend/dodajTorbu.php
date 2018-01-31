<?php

  include_once("../../config/dbconfig.php");

  $slika = $_FILES['file']['name'];
  if(proveriPodatke()) {
    if(!uploadSlike()) {
      exit();
    }

    $sql_insert = "INSERT INTO stavke_torbe (`Naziv`, `Opis`, `Cena`, `Slika`, `Alt`, `Link`, `Kategorija`, `Kolicina`) VALUES ('".$_POST['naziv']."','".$_POST['opis']."','".$_POST['cena']."','".$slika."','".$_POST['alt']."','".$_POST['link']."','".$_POST['Kategorija']."','".$_POST['kolicina']."')";
    mysqli_query($connection, $sql_insert);
    echo "Uspesno poslato";
  } else {
    echo "Nije dobro";
  }


function proveriPodatke() {
  if (empty($_POST['naziv']) || empty($_POST['cena']) || empty($_POST['alt']) || empty($_POST['link']) || empty($_POST['kolicina']) || empty($_POST['opis']) || empty($_POST['Kategorija']))
  {
    return false;
  } else {
    return true;
  }
}

function uploadSlike() {
  $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
  $targetPath = "../../img/".$_FILES['file']['name']; // Target path where file is to be stored
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetPath,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["file"])) {
      $check = getimagesize($_FILES["file"]["tmp_name"]);
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
