<?php

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_DATABASE = "laptop-torbe";

global $connection;
$connection  = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

 ?>
