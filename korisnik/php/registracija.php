<?php
include_once("../../config/dbconfig.php");
session_start();

$p_podaci = ["korisnicko_ime" => $_POST['korisnicko_ime'], "email" => $_POST['email'], "lozinka" => $_POST['lozinka'], "potvrda_lozinke" => $_POST['potvrda_lozinke'], "captcha" => $_POST['captcha']];
$l_podaci = ["ime" => $_POST['ime'], "prezime" => $_POST['prezime'], "datum_rodjenja" => $_POST['datum_rodjenja'], "jmbg" => $_POST['jmbg'], "mobilni" => $_POST['mobilni'], "adresa" => $_POST['adresa'],
 "drzava" => $_POST['drzava'], "grad" => $_POST['grad'], "postanski_broj" => $_POST['postanski_broj']];


function proveraPodataka($p_podaci) {
  foreach ($p_podaci as $key => $value) {
    if (strlen($value) < 1) {
      $value = implode(" ", explode("_", $key))." je obavezno polje!";
      echo ucfirst($value);
      echo "<br>";
      return false;
    }
  }

  if (strlen($p_podaci['korisnicko_ime']) < 5) {
    echo "Korisničko ime mora da sadrzi minimum 5 karaktera!";
  } else {
    if (strlen($p_podaci['lozinka']) < 6) {
      echo "Lozinka mora da sadrži minimum 6 karaktera!";
    } else {
      if (!proveriLozinke($p_podaci['lozinka'],$p_podaci['potvrda_lozinke'])) {
        echo "Lozinke se ne podudaraju!";
      } else {
        if ($p_podaci['captcha'] != $_SESSION['digit']) {
          echo "the CAPTCHA code entered was incorrect!";
          session_destroy();
        } else {
          return true;
        }
      }
    }
  }
}

function registrujKorisnika($p_podaci,$l_podaci,$connection) {
  if (!proveraPodataka($p_podaci)) {
    header("refresh:2;url=../registracija.html");
  } else {
    if (proveriKorisnika($p_podaci['korisnicko_ime'], $connection))
    {
      if (proveriEmail($p_podaci['email'])) {
      $sqlInsert = "INSERT INTO korisnici (Korisnicko_Ime, Lozinka, Email, Ime, Prezime, Datum_rodjenja, JMBG, Mobilni, Adresa, Postanski_broj, Grad, Drzava)
                    VALUES ('".$p_podaci['korisnicko_ime']."', '".md5($p_podaci['lozinka'])."', '".$p_podaci['email']."', '".$l_podaci['ime']."', '".$l_podaci['prezime']."', '".$l_podaci['datum_rodjenja']."',
                    '".$l_podaci['jmbg']."', '".$l_podaci['mobilni']."', '".$l_podaci['adresa']."', '".$l_podaci['postanski_broj']."', '".$l_podaci['grad']."', '".$l_podaci['drzava']."')";
      $current_id = mysqli_query($connection, $sqlInsert);
      if (!$current_id) {
        echo "Greska";
      } else {
        // $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."activate.php?id=" . $current_id;
      	// $toEmail = $p_podaci["email"];
      	// $subject = "User Registration Activation Email";
      	// $content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
      	// $mailHeaders = "From: Admin\r\n";
        // $mail->Mailer = "smtp";
        // $mail->Host = "ssl://smtp.gmail.com";
        // $mail->Port = 465;
        // $mail->SMTPAuth = true; // turn on SMTP authentication
        // $mail->Username = "edincedin@gmail.com"; // SMTP username
        // $mail->Password = "veomalako"; // SMTP password
        // if(mail($toEmail, $subject, $content, $mailHeaders)) {
		    //     $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
	      // }
        //
        // echo $message;
        echo "Uspesna registracija";
      }
    } else {
      echo "Email adresa ".$p_podaci['email']." je vec reigstrovana!";
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

function proveriEmail($email) {
  global $connection;

  $sqlSelect = "SELECT * FROM korisnici WHERE Email = '".$email."'";
  $num_of_rows = mysqli_num_rows(mysqli_query($connection, $sqlSelect));

  if ($num_of_rows == 0) {
    return true;
  } else {
    return false;
  }

}

registrujKorisnika($p_podaci, $l_podaci, $connection);

 ?>
