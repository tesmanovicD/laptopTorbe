<!-- BOOTSTRAP CSS-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<!-- JQUERY SCRIPT-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../js/javascriptfile.js"></script>
<?php
session_start();
include_once("../../config/dbconfig.php");
if(!isset($_SESSION['user_id']) || $_SESSION['user_admin'] == 0 ) {
  header("refresh: 2; url=../../index.php");
} else {

if (isset($_GET['id'])) {
  $poslato = 0;
  $nije_poslato = 0;
  $status_porudzbine;
  $id_porudzbine = $_GET['id'];
  $sql_select = "SELECT * FROM `porudzbine` WHERE ID_Porudzbine = ".$id_porudzbine." ";
  $result = mysqli_query($connection, $sql_select);
  $result2 = mysqli_query($connection, $sql_select);

  $row = mysqli_fetch_assoc($result);
  echo "<h3 class=\"text-center\">Porudzbina ID#".$row["ID_Porudzbine"]."</h3>";
  echo "<div class=\"container\">";
  echo "<table class=\"table table-bordered\">";
  echo "<tr>";
  echo "<th scope=\"col\">Porucioc</th>";
  echo "<th scope=\"col\">Adresa Porucioca</th>";
  echo "<th scope=\"col\">Datum Porucivanja</th>";
  echo "</tr>";
  echo "<tbody>";
  echo "<tr>";
  echo "<td> ".$row["Ime"]." ".$row["Prezime"]."</td>";
  echo "<td> ".$row["Adresa"]." ".$row["Drzava"]." ".$row["Postanski_Broj"]." ".$row["Grad"]."</td>";
  echo "<td> ".date("d-m-Y",strtotime($row["Datum_Kupovine"]))."</td>";
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";


  if (mysqli_num_rows($result2) > 0) {
      echo "<table class=\"table table-hover table-bordered\">";
      echo "<thead>";
      echo "<tr>";
      echo "<th scope=\"col\">ID Torbe</th>";
      echo "<th scope=\"col\">Cena Torbe</th>";
      echo "<th scope=\"col\">Status Posiljke</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
    while($rows = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      if ($rows['Poslato'] ==  1) {
        $poslato ++;
      } else {
        $nije_poslato ++;
      }
      echo "<tr>";
      echo "<td><a href=../../loadBag.php?id=".$rows["ID_Torbe"].">".$rows["ID_Torbe"]."</a></td>";
      echo "<td>".$rows["Cena"]." RSD</td>";
      if ($rows["Poslato"] == 1) { echo "<td>Poslato</td>"; }
      else { echo "<td>Nije poslato</td>"; }
      ?><td style="width:50px;"><button class="btn btn-success test" <?php if($rows["Poslato"] == 1){ echo 'disabled="disabled"';} ?> onclick="promeniStatus(<?php echo $rows["ID"]; ?>)">Poslato</button></td>
      <?php
      echo "</tr>";
    }
      echo "</tbody>";
      echo "</table>";
      echo "</div class=\"container\">";
  } else {
    echo "Porudzbina ID: ".$id_porudzbine." nije pronadjena!";
  }
}
if ($poslato > 0 ) {
  if ($nije_poslato >0) {
    $statusPorudzbine = "Nije Obradjen!";
    $color = "#F00";
  } else {
    $statusPorudzbine = "Obradjeno!";
    $color = "#0F0";
  }
} else {
  $statusPorudzbine = "Nije Obradjen!";
  $color = "#F00";
}

echo "<h3 class=\"text-center\" style=\"color:".$color."\">".$statusPorudzbine."</h3>";


}
 ?>

<script>
  function promeniStatus(id1,id2) {
    if (id2 === undefined) {
      $.ajax({
        data: { ime: "promeniStatus", status: id1 },
        type: "POST",
        url: "izmeniBazu.php",
        success: function(data) {
          alert(data);
          location.reload();
        }
      })
    } else {
      // console.log("defined");
      // console.log(id1,id2);
    }
  }
</script>
