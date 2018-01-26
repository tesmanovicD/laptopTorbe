<!-- BOOTSTRAP CSS-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include_once("../../config/dbconfig.php");
if(!isset($_SESSION['user_id']) || $_SESSION['user_admin'] == 0 ) {
  header("refresh: 2; url=../../index.php");
} else {

if (isset($_GET['id'])) {
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
      echo "<th scope=\"col\">ID</th>";
      echo "<th scope=\"col\">Cena</th>";
      echo "<th scope=\"col\">Status</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
    while($rows = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      echo "<tr>";
      echo "<td>".$rows["ID_Torbe"]."</td>";
      echo "<td>".$rows["Cena"]."</td>";
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




}
 ?>

<script>
  function promeniStatus(id1,id2) {
    if (id2 === undefined) {
      console.log("undefined");
      console.log(id1);

      $.ajax({
        data: { ime: "promeniStatus", status: id1 },
        type: "POST",
        url: "izmeniBazu.php",
        success: function(data) {
          alert("Uspesno");
        }
      })
    } else {
      console.log("defined");
      console.log(id1,id2);
    }
  }
</script>
