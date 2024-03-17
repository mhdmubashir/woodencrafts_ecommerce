<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "woodcraft_store";

//create cnction using idp
$connection = mysqli_connect($hostname, $username, $password, $database);

// chcking connecttionn
if (!$connection) {
    die ("Connection failed: " . mysqli_connect_error());
}
?>