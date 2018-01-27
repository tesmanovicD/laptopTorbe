<?php

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_DATABASE = "laptop-torbe";

global $connection;
$connection  = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);


//Creating Array for JSON response

// Check if we got the field from the user
if (isset($_GET['code'])) {

    $promo = $_GET['code'];


    $sql_insert = "INSERT INTO promo_code (promo) VALUES ('$promo')";
    if(mysqli_query($connection,$sql_insert)){
        echo 'uredu je';

    }
    else
        echo "nije u redu";
}


?>