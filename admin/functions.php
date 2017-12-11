<?php
include_once("../config/dbconfig.php");



function brojKorisnika() {
  global $connection;
  $sql_select = "SELECT * FROM korisnici";
  $reg_korisnici = mysqli_num_rows(mysqli_query($connection,$sql_select));

  echo $reg_korisnici;
}

function brojLaptopTorbi() {
  global $connection;
  $sql_select = "SELECT * FROM stavke_torbe";
  $broj_torbi = mysqli_num_rows(mysqli_query($connection,$sql_select));

  echo $broj_torbi;
}

function listanjeKategorija() {
  global $connection;
  $sql_select = "SELECT Kategorija FROM stavke_torbe";
  $type = $this->mysql->select("SHOW COLUMNS FROM stavke_torbe WHERE Field = 'Kategorija'")[0]["Type"];
   preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
   $enum = explode("','", $matches[1]);
   return $enum;
   echo $enum;
}

function dodajBrend() {

}

 ?>
