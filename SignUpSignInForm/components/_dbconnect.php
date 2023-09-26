<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "myuserdata";

$connect = mysqli_connect($server, $username, $password, $database);

if(!$connect){
//     echo "Success";
// }
// else{
    dia("Error " . mysqli_connect_error());
}

?>