<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "signupdb";

$connect = mysqli_connect($server, $username, $password, $database);

if(!$connect){
//     echo "Success";
// }
// else{
    dia("Error " . mysqli_connect_error());
}

?>