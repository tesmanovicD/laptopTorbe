<?php
include("../../config/dbconfig.php");
// $korisnicko_ime = $_POST['korisnicko_ime'];
// $email = $_POST['email'];
// $lozinka = $_POST['lozinka'];
// $potvrda_lozinke = $_POST['potvrda_lozinke'];
// $ime = $_POST['ime'];
// $prezime = $_POST['prezime'];
// $datum_rodjenja = $_POST['datum_rodjenja'];
// $jmbg = $_POST['jmbg'];
// $mobilni = $_POST['mobilni'];
// $adresa = $_POST['adresa'];
// $drzava = $_POST['drzava'];
// $grad = $_POST['grad'];
// $postanski_broj = $_POST['postanski_broj'];

$p_podaci = ["korisnicko_ime" => $_POST['korisnicko_ime'], "email" => $_POST['email'], "lozinka" => $_POST['lozinka'], "potvrda_lozinke" => $_POST['potvrda_lozinke']];
$l_podaci = ["ime" => $_POST['ime'], "prezime" => $_POST['prezime'], "datum_rodjenja" => $_POST['datum_rodjenja'], "jmbg" => $_POST['jmbg'], "mobilni" => $_POST['mobilni'], "adresa" => $_POST['adresa'],
 "drzava" => $_POST['drzava'], "grad" => $_POST['grad'], "postanski_broj" => $_POST['postanski_broj']];
//$kor_ime,$email,$lozinka,$pot_loz,$ime,$prezime,$dat_rodj,$jmbg,$mob,$adr,$grad,$post_br

function proveraPodataka($p_podaci) {
  foreach ($p_podaci as $key => $value) {
    if (strlen($value) < 1) {
      $value = implode(" ", explode("_", $key))." je obavezno polje!";
      echo ucfirst($value);
      echo "<br>";
      return false;
    }
  }

  if (!proveriLozinke($p_podaci['lozinka'],$p_podaci['potvrda_lozinke'])) {
    echo "Lozinke se ne podudaraju!";
  } else {
    return true;
  }

}

function registrujKorisnika($p_podaci,$l_podaci,$connection) {
  if (!proveraPodataka($p_podaci)) {
     header("refresh:2;url=../registracija.html");
  } else {
    if (proveriKorisnika($p_podaci['korisnicko_ime'], $connection))
    {
    $sqlInsert = "INSERT INTO korisnici (Korisnicko_Ime, Lozinka, Email, Ime, Prezime, Datum_rodjenja, JMBG, Mobilni, Adresa, Postanski_broj, Grad, Drzava)
                  VALUES ('".$p_podaci['korisnicko_ime']."', '".$p_podaci['lozinka']."', '".$p_podaci['email']."', '".$l_podaci['ime']."', '".$l_podaci['prezime']."', '".$l_podaci['datum_rodjenja']."',
                  '".$l_podaci['jmbg']."', '".$l_podaci['mobilni']."', '".$l_podaci['adresa']."', '".$l_podaci['postanski_broj']."', '".$l_podaci['grad']."', '".$l_podaci['drzava']."')";
    if (!mysqli_query($connection, $sqlInsert)) {
      echo "Greska";
    } else {
      echo "Upisano";
    }
  } else {
    echo "Korisnicko ime ".$p_podaci['korisnicko_ime']." je vec reigstrovano!";
  }
  }
}

function proveriLozinke($lozinka, $potvrda_lozinke) {
  if ($lozinka === $potvrda_lozinke) {
    return true;
  } else {
    return false;
  }
}

function proveriKorisnika($korisnicko_ime, $connection) {
  $sqlSelect = "SELECT * FROM korisnici WHERE Korisnicko_Ime = '".$korisnicko_ime."'";
  $num_of_rows = mysqli_num_rows(mysqli_query($connection,$sqlSelect));
  if ($num_of_rows == 0) {
    return true;
  } else {
    return false;
  }

}

registrujKorisnika($p_podaci, $l_podaci, $connection);

 ?>
