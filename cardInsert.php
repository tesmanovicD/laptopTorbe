<?php
  require_once("./config/dbconfig.php");
  session_start();

  if (!$_POST['secret'] || $_POST['secret'] != md5("VTS". $_SESSION["korisnicko_ime"] . "VTS")) {
    header("Location:./img/card.php");
    exit();
  }

  $cartDetails = $_SESSION["cart"];

  function getUserID($korisnicko_ime) {
    global $connection;
    $sql_select = "SELECT `ID` from korisnici WHERE `Korisnicko_ime` = '".$_SESSION["korisnicko_ime"]."'";
    $result = mysqli_query($connection,$sql_select);
    while($id = mysqli_fetch_row($result)){
      return $id[0];
    }
  }
$id_korisnika = getUserID($_SESSION["korisnicko_ime"]);
$id_porudzbine = date("dm").mt_rand(1,99);
$promo_code = $_SESSION["promo_code"];
$discount = $_SESSION["discount"];

  foreach ($cartDetails as $cart) {
      $product_id = $cart["product_id"];
      $item_name = $cart["item_name"];
      $item_quantity = $cart["item_quantity"];
      $product_price = $cart["product_price"] - ($cart["product_price"]*$discount);


      $sql_insert = "INSERT INTO porudzbine (`ID_Korisnika`, `ID_Torbe`, `Datum_Kupovine`, `Ime`, `Prezime`, `JMBG`, `Broj_Mobilnog`, `Adresa`, `Drzava`, `Grad`, `Postanski_Broj`, `Cena`, `Promo_Code`, `ID_Porudzbine`) VALUES ( '".$id_korisnika."', '".$product_id."', '".date('Y-m-d h:i:s')."', 'Petar', 'Petrovic', 12344532, 066334123, 'Stevana Mokranjca', 'Srbija', 'Beograd', 11000, ".$product_price." , '".$promo_code."' ,'".$id_porudzbine."')";
      $sql_update = "UPDATE `promo_code` SET `status` = 1 WHERE `promo` = '".$promo_code."'";
      $sql_update1 = "UPDATE `stavke_torbe` SET `Kolicina` = Kolicina - ".$item_quantity." WHERE ID = ".$product_id."";
      var_dump($sql_update1);
      if(mysqli_query($connection,$sql_insert) && mysqli_query($connection,$sql_update)) {
        $status = true;
        unset($_SESSION["cart"]);
        unset($_SESSION["discount"]);
        unset($_SESSION["promo_code"]);
      } else {
        $status = false;
      }
  }

  if ($status) {
    echo "Uspesna porudzbina broj: ". $id_porudzbine;
  } else {
    echo "Neuspesna porudzbina, pokusajte ponovo!";
  }


 ?>
