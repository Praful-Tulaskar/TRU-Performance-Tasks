<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'components/_dbconnect.php';
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];


    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }

    // Check whether Email Exists
    $existsql =  "SELECT * FROM registeredlist WHERE Email = '$email'";
    $result = mysqli_query($connect, $existsql);
    $existsRow = mysqli_num_rows($result);
    // $firstname = $_POST["firstname"];
    // $lastname = $_POST["lastname"];


    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname, $lastname)) {
        $showError = "Only letters and white space allowed";
        // header("location: signUp.php");
        // echo `<script>window.location = "signUp.php"</script>`;
    }

    elseif($existsRow > 0){
        $showError = " User already exists";
    }

    else{
    
    $sql = "INSERT INTO `registeredlist` (`firstname`, `lastname`, `email`) VALUES ('$firstname', '$lastname', '$email')";

    $resul = mysqli_query($connect, $sql);

    if($resul){
        $showAlert = true;
    }
    // else{
    //     echo "Data not inserted";
    // }
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="user.css">

    <title>User Registration Form</title>
</head>
<body>
   
<?php require 'components/_navbar.php' ?>

<?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You Registered Successfully.
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


<div class="container d-flex justify-content-center">
        <div class="screen">
            <div class="screen__content">
                <form action="userregister.php" method="post" class="login">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="First Name" name="firstname" required="required">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Last Name" name="lastname" required="required">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email" required="required">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Register User</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>