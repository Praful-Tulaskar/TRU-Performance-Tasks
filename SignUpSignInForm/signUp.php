<?php 

session_start();
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'components/_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    // Check whether Username Exists
    $existsql =  "SELECT * FROM usersdata WHERE username = '$username'";
    $result = mysqli_query($connect, $existsql);
    $existsRow = mysqli_num_rows($result);
    $name = test_input($_POST["username"]);
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $showError = "Only letters and white space allowed";
            // header("location: signUp.php");
            // echo `<script>window.location = "signUp.php"</script>`;
    }

    elseif($existsRow > 0){
        $showError = "User already exists";
        // header("location: signUp.php");
    }
    else{

        if($password == $cpassword){

            $sql = "INSERT INTO `usersdata` (`username`, `email`, `password`, `date`) VALUES ('$username', '$email', '$password', current_timestamp())";
            $result = mysqli_query($connect, $sql);

            if($result){
                $showAlert = true;
                // header("location: signUp.php");
            }
        }

        else{
                $showError = "Password do not match";
            }  
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

    <title>Sign Up</title>
</head>

<body>


<?php require 'components/_navbar.php' ?>


<?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Account Successfully Created.
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

    <div class="container">
        <form action="http://localhost/SignUpSignInForm/signUp.php" method="post" class="Form SignUp">
            <h2>Sign Up</h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <i class="fa-regular fa-user"></i>
                <span>Username</span>
            </div>

            <div class="inputBox">
                <input type="email" name="email" required="required">
                <i class="fa-regular fa-envelope"></i>
                <span>Emain Address</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>Create Password</span>
            </div>
            <div class="inputBox">
                <input type="password" name="cpassword" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>Confirm Password</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Create Account">
            </div>
            <!-- <p>Already a member ? <a href="#" class="login"> &nbspLog in</a></p> -->
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>