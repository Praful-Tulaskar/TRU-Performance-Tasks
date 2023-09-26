<?php 
session_start();
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'components/_dbconnect.php';

$connect = mysqli_connect($server, $username, $password, $database);
    $username = $_POST['username'];
    // $email = $_POST["email"];
    $password = $_POST['password'];
    // $cpassword = $_POST["cpassword"];
    

        $sql = "SELECT * FROM usersdata where username = '$username' && password = '$password'";

        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $login = true;
            
            $fetchdata = mysqli_fetch_assoc($result);
            
            $_SESSION['password'] = $fetchdata['password'];
            $_SESSION['username'] = $fetchdata['username'];
            header("location: welcome.php");
        }

        else{
            $showError = "Invalid Credentials";
            
        }
    }

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="signUp.css">

    <title>Sign In</title>
</head>

<body>

    <?php require 'components/_navbar.php' ?>
    

    <?php
    if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are Logged In.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
?>

  
    <div class="container signinForm">

        <form action="http://localhost/SignUpSignInForm/signIn.php" method="post" class="Form SignIn">
            <h2>Sign In</h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <i class="fa-regular fa-user"></i>
                <span>Username</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>Password</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Login">
            </div>
            <p>Not Registered ? <a href="http://localhost/SignUpSignInForm/signUp.php" class="create"> &nbspCreate
                    an account</a></p>
        </form>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>


</body>

</html>