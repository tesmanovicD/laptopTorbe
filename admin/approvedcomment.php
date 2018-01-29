<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];

    require "../config/dbconfig.php";

    $sql="UPDATE komentari SET odobren=1 WHERE id=$id";
    $result=mysqli_query($connection,$sql)or die(mysqli_error($connection));
    if (mysqli_affected_rows($connection)==1){
        header("Location: komentari.php" );
    }

}
