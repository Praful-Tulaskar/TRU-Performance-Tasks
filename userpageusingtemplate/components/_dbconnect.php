<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "registereddatadb";

$connect = mysqli_connect($server, $username, $password, $database);

if(!$connect){
    dia("Error " . mysqli_connect_error());
}

?>