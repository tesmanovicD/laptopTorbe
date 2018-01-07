<?php
session_start();
include_once("../../config/dbconfig.php");

$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = md5($_POST['lozinka']);

function proveraPodataka($korisnicko_ime, $lozinka) {
  if (strlen($korisnicko_ime) < 5) {
    echo "Korisnicko ime mora da sadrzi minimum 5 karaktera!";
    return false;
  } else {
    if (strlen($lozinka) < 6) {
      echo "Lozinka mora da sadrzi minimum 6 karaktera!";
      return false;
    }
  }
  return true;
}

function proveriPrivilegije($korisnicko_ime, $lozinka, $connection) {
  $sqlSelect = "SELECT Admin FROM korisnici WHERE Korisnicko_Ime = '".$korisnicko_ime."' AND Lozinka = '".$lozinka."' ";
  $result = mysqli_query($connection, $sqlSelect);
  if ($row = $result->fetch_assoc()) {
    $korisnik_admin = $row["Admin"];
  }
  return $korisnik_admin;
}

function proveriKorisnika($korisnicko_ime, $lozinka, $connection) {
  $sqlSelect = "SELECT * FROM korisnici WHERE Korisnicko_Ime = '".$korisnicko_ime."' AND Lozinka = '".$lozinka."' ";
  $num_of_rows = mysqli_num_rows(mysqli_query($connection,$sqlSelect));


  if ($num_of_rows == 0) {
    return true;
  } else {
    return false;
  }
}


function prijaviKorisnika($korisnicko_ime, $lozinka, $connection) {
  if (!proveraPodataka($korisnicko_ime, $lozinka)) {
    header("refresh:2;url=../login.html");
  } else {
    if (!proveriKorisnika($korisnicko_ime, $lozinka, $connection))
    {
      $_SESSION["korisnicko_ime"] = $korisnicko_ime;
      $_SESSION["user_id"] = md5($korisnicko_ime);
      $_SESSION['user_admin'] = proveriPrivilegije($korisnicko_ime, $lozinka, $connection);
      header("Location: ../../index.php");
    } else {
      echo "Korisnicko ime ili lozinka nisu validni!";
      header("refresh:2;url=../login.html");
    }
  }
}

prijaviKorisnika($korisnicko_ime, $lozinka, $connection);

?>
