
<?php
session_start();
function sessionStarted() {
  if (isset($_SESSION['user_admin'])) {
    return true;
  } else {
    return false;
  }
}
if (!isset($_SESSION["discount"])) {
  $_SESSION["discount"] = 0;
}

if (!isset($_SESSION['promo_code'])) {
  $_SESSION['promo_code'] = "nema";
}
$database_name = "laptop-torbe";
global $con;
$con = mysqli_connect("localhost","root","",$database_name);

if(isset($_POST['mod'])) {
  if ($_POST['mod'] == 'changeQuantity') {
    $_SESSION["cart"][0]["item_quantity"] = $_POST['changeQuantity'];
    exit();
  }
  if ($_POST['mod'] == 'checkPromo') {
    $promo = $_POST['promoCode'];
    $sql_select = "SELECT * FROM `promo_code` WHERE `promo` ='".$promo."' AND `status` = 0";
    $result = mysqli_query($con, $sql_select);

    if (mysqli_num_rows($result) > 0) {
      echo "Postoji";
      $_SESSION["discount"] = 0.15;
      $_SESSION['promo_code'] = $promo;
      exit();
    } else {
      echo "Invalid";
      exit();
    }

  }
}

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="card.php"</script>';
        }else{
            echo '<script>alert("Već ste dodali proizvod u korpu!")</script>';
            echo '<script>window.location="card.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}


if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Uspešno ste uklonili proizvod iz korpe!")</script>';
                echo '<script>window.location="card.php"</script>';
            }
        }
    }
}

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Korpa</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!-- JQUERY SCRIPT-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--JQUERY MD5 SCRIPT-->
    <script src="../js/jQuery-MD5.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="description" content="Laptop Torbe je online prodavnica koja pruža kupovinu laptop torbi i ruksaka širokog asortimana i raznih brendova po najpovoljnijim cenama">
    <meta name="keywords" content="torbe za laptop,hp torbe za laptop,torbe laptop,ranac,laptop,jeftine torbe online,prodaja torbi povoljno,sve za laptop,ranac za laptop,rancevi prodaja">
    <meta name="author" content="Laptop Torbe">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FACEBOOK OPEN GRAPH META TAGS -->
    <meta property="fb:app_id" content="988563297942517" />
    <meta property="og:url" content="http://laptop-torbe.me/" />
    <meta property="og:title" content="Laptop Torbe - Online prodaja laptop torbi i ruksaka" />
    <meta property="og:description" content="Laptop Torbe je online prodavnica koja pruža kupovinu laptop torbi i ruksaka širokog asortimana i raznih brendova po najpovoljnijim cenama" />
    <meta property="og:image" content="img/banner_laptop_torbe.png" />
    <meta property="og:type" content="website" />

    <!-- FONT SCHOOLBELL-->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Reenie+Beanie|Imprima|Schoolbell" rel="stylesheet">
    <!-- BOOTSTRAP CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONT AWESOME FOR ICONS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- NORMALIZE.CSS GLITCH FIX -->
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">


    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web|Reenie+Beenie');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>


</head>
<body style="background-image: url('pozadina.jpg');background-attachment: fixed;">


<nav class="navbar navbar-inverse navbar-static-top" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Laptop-Torbe.me</a>
        </div><!--end of navbar-header-->

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="itemscentered">
                <li><a href="../index.php">Početna stranica &nbsp;&nbsp;<span class=" glyphicon glyphicon-home"></span></a></li>
                <li class="active"><a href="../laptop-torbe.php">Naši proizvodi &nbsp;&nbsp;<span class=" glyphicon glyphicon-briefcase"></span></a></li>
                <li><a href="../kontakt.php">Kontakt &nbsp;&nbsp;<span class="  glyphicon glyphicon-phone-alt"></span></a></li>
                <li><a href="../onama.php">O nama &nbsp;&nbsp;<span class="  glyphicon glyphicon-education"></span></a></li>
                <?php if(!sessionStarted()) { ?><li><a href="korisnik/registracija.html">Registracija &nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
                <?php if(!sessionStarted()) { ?><li><a href="korisnik/login.html">Prijava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
        				<?php if(sessionStarted()) { ?><li><a href="korisnik/php/logout.php">Odjava &nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li><?php } ?>
                <?php if(sessionStarted()) { ?><li><a href="#">Prijavljeni ste kao <span id="korisnicko_ime"><?php echo $_SESSION["korisnicko_ime"] ?></span> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li><?php } ?>
            </ul><!--end of navbar items-->
        </div><!--end of myNavbar-->
    </div><!--end of container-fluid-->
</nav><!--end of navbar-->


<div class="container" style="width: 65%">
    <h2 style="color:black;border: 1px solid black;border-radius: 12px;font-weight: bold;background-color: rgba(14,142,85,0.24);font-family: 'Amatic SC',cursive;font-size: 40px;">KORPA &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
    <?php
    $query = "SELECT * FROM stavke_torbe ORDER BY ID ASC ";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            ?>
            <div class="col-md-3"  >

                <form id="cardForm" method="post" action="card.php?action=add&id=<?php echo $row["ID"]; ?>">

                    <div class="product" style="border: 1px solid black;margin-right: 25px;margin-bottom: 20px;border-radius: 2%;background-color:rgba(255,255,255,0.53);)">
                        <img src="<?php echo $row["Slika"]; ?>" class="img-responsive">
                        <h5 class="text-info"><?php custom_echo($row['Naziv'], 32); ?></h5>
                        <h5 class="text-danger"><?php echo $row["Cena"]; ?></h5>
                        <input type="text" name="quantity" class="form-control" value="1">
                        <input type="hidden" name="hidden_name" value="<?php echo $row["Naziv"]; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["Cena"]; ?>">
                        <input type="submit" name="add" style="margin-top: 5px;border: 1px solid black;" class="btn btn-success"
                               value="Dodaj u korpu">
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>

    <div style="clear: both"></div>
    <h3 class="title2" style="color:black;border: 1px solid black;border-radius: 12px;font-weight: bold;background-color: rgba(19,121,61,0.34);font-family: 'Amatic SC',cursive;font-size: 40px;">Detalji korpe</h3>
    <div class="table-responsive" id="cardTable">
        <table class="table table-bordered">
            <tr>
                <th width="30%" style="font-size: 18px;">Ime proizvoda</th>
                <th width="10%" style="font-size: 18px;">Količina</th>
                <th width="13%" style="font-size: 18px;">Cena proizvoda</th>
                <th width="10%" style="font-size: 18px;">Ukupna cena</th>
                <th width="17%" style="font-size: 18px;">Ukloni iz korpe</th>
            </tr>

            <?php
            if(!empty($_SESSION["cart"])){
                $total = 0;
                foreach ($_SESSION["cart"] as $key => $value) {
                    ?>
                    <tr class="item_details">
                        <td style="background-color:white;font-size: 18px;" id="item_name"><?php echo $value["item_name"]; ?></td>
                        <td style="background-color:white;font-size: 18px;"><input type="text" class="quantity" value="<?php echo $value['item_quantity']?>"></td>
                        <td style="background-color:white;font-size: 18px;" id="product_price"><?php echo $value["product_price"]; ?> RSD </td>
                        <td style="background-color:white;font-size: 18px;">
                          <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?>  RSD </td>
                        <td style="background-color:white"><a href="card.php?action=delete&id=<?php echo $value["product_id"]; ?>">
                                <input type="submit" name="remove" class="btn btn-danger" value="Ukloni iz korpe"></a></td>

                    </tr>
                    <?php
                    $total = $total + ($value["item_quantity"] * $value["product_price"]);
                }
                 $total = $total - ($total*$_SESSION["discount"]);
                ?>
                <tr>
                    <td style="background-color:white">
                      Promo kod: <br/>
                      <input type="text" name="promoCode" id="promoCode" maxlength="5"/>
                    </td>
                    <td colspan="2" align="right" style="background-color:white;font-size: 18px;font-weight: bold">Ukupan iznos korpe:</td>
                    <th align="right" style="font-size: 18px;"><?php echo number_format($total, 2); ?> RSD </th>
                    <td style="background-color:white">

                        <input type="submit" name="izvrsi_narudzbinu" id="izvrsi_narudzbinu" class="btn btn-success" value="Izvrsi narudzbinu">

                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

</div>


<div id="footer">
    <div class="text-center center-block">
        <h4 style="font-family: Reenie Beanie;font-size:20px;"> Laptop-Torbe.rs</h4>
        <h4 style="font-family: Amatic SC;font-size:25px;">ŠKOLSKI PROJEKAT</h4>
        <a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-3x social"></i></a>
        <a href="https://twitter.com"><i class="fa fa-twitter-square fa-3x social"></i></a>
        <a href="https://instagram.com"><i class="fa fa-instagram fa-3x social"></i></a>
    </div>
</div><!--end of footer-->

<script>
$(".quantity").change(function() {
  var changeQuantity = $(this).val();
  var product_id = $(this).parents().html();
  alert(product_id);
  $.ajax({
       url: "card.php",
       type: "post",
       data: { mod: "changeQuantity", changeQuantity: changeQuantity},
       success: function (response) {
          window.location="card.php";
       }
   });
});

$("#promoCode").change(function() {
  var promoCode = $(this).val();
  $.ajax({
    url: "card.php",
    type: "post",
    data: { mod: "checkPromo", promoCode: promoCode },
    success: function(data) {
      alert(data);
      location.reload();
    }
  })
})

$("#izvrsi_narudzbinu").on("click", function() {
//ajax poziv
var korisnicko_ime = $("#korisnicko_ime").html();
var secret = $.md5("VTS"+korisnicko_ime+"VTS");

$.ajax({
     url: "../cardInsert.php",
     type: "post",
     data: { secret: secret },
     success: function (data) {
        alert(data);
        window.location.href = "http://localhost/LAPTOP-TORBE/img/card.php";
     }
 });

})


</script>

</body>
</html>
