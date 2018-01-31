<?php
include_once("../../config/dbconfig.php");
if (isset($_POST["forgotPassword"])) {
    $email = mysqli_real_escape_string($connection, $_POST["forgotPassword"]);
    $sql_select = "SELECT id FROM `korisnici` WHERE Email = '".$email."'";
    $result = mysqli_query($connection, $sql_select);

    if (mysqli_num_rows($result) > 0) {
      $str = "03565emikmtroimfweo324o0-tkerkm235_214rffhgkl";
      $str = str_shuffle($str);
      $str = substr($str, 0,10);
      $current_path = $_SERVER['SERVER_NAME'].trim($_SERVER['PHP_SELF'], "forgotPassword.php");
      $url = "http://".$current_path."resetPassword.php?token=$str&email=$email";
      mail($email, "Povrat Lozinke", "Za resetovanje Vase sifre, posetite sledeci link: $url", "From: admin@laptop-torbe.me\r\n");
      $sql_update = "UPDATE `korisnici` SET Token ='".$str."' WHERE Email = '".$email."'";
      mysqli_query($connection, $sql_update);
      echo "Za resetovanje Vase sifre, posetite sledeci link: $url";
    } else {
      echo "Greska, korisnicki nalog nije pronadjen!";
    }
}

 ?>
