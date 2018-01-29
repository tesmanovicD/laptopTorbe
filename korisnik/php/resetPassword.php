<?php
include_once("../../config/dbconfig.php");
  if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = mysqli_real_escape_string($connection, $_GET['email']);
    $token = mysqli_real_escape_string($connection, $_GET['token']);

    $sql_select = "SELECT id FROM `korisnici` WHERE Email = '".$email."' AND Token = '".$token."'";
    $result = mysqli_query($connection, $sql_select);

    if (mysqli_num_rows($result) > 0) {
      $str = "r5kok032mfklwmdb_21korwe";
      $str = str_shuffle($str);
      $str = substr($str, 0, 15);
      $password = md5($str);
      $sql_update = "UPDATE `korisnici` SET Lozinka = '".$password."' WHERE Email = '".$email."'";
      $sql_update2 = "UPDATE `korisnici` SET Token = '' WHERE Email = '".$email."'";
      mysqli_query($connection, $sql_update);
      mysqli_query($connection, $sql_update2);

      echo "Vasa nova lozinka je: ".$str;
    } else {
      echo "Link nije validan!";
    }

  } else {
    header("Location: ../login.html");
    exit();
  }

 ?>
