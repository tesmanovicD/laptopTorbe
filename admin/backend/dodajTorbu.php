<?php

  include_once("../../config/dbconfig.php");

  if(proveriPodatke()) {
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

 ?>
