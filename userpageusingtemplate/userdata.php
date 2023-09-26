<?php
include 'components/_dbconnect.php';

?>

<?php

$showAlert = false;
$showMsg = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST['srnoDelete'])){
    $srno = $_POST["srnoDelete"];
    $sql = "DELETE FROM `registeredlist` WHERE `registeredlist`.`srno` = $srno";
    $result = mysqli_query($connect, $sql);
    $showMsg = " Record Deleted Successfully";
  }
  
  if(isset($_POST['srnoEdit'])){
    // echo "yes";
    // exit;
    $srno = $_POST["srnoEdit"];
    $firstname = $_POST["firstnameEdit"];
    $lastname = $_POST["lastnameEdit"];
    $email = $_POST["emailEdit"];

    // Check whether Email Exists
    // $existsql =  "SELECT * FROM userlist WHERE Email = '$email'";
    // $result = mysqli_query($connect, $existsql);
    // $existsRow = mysqli_num_rows($result);

    // if($existsRow > 0){
    //     $showError = " User already exists";
    // }

    // else{
    
    $sql = "UPDATE `registeredlist` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `registeredlist`.`srno` = $srno";

    $result = mysqli_query($connect, $sql);

    if($result){
        $showAlert = true;
    }
    else{
        echo "Data not inserted";
    }
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="user.css">

    <title>User Data List</title>

    <style>
        
        body{
          min-height: 100vh;
          background: #87a8cb;
        }

        h2{
          color: #fff;
          font-weight: 500;
          letter-spacing: 0.1em;
          text-align: center;
        }

        .dltmsg{
          color: #000;
          font-weight: 500;
        }
    </style>
</head>
<body>

<?php require 'components/_navbar.php' ?>

<?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Updated Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    if($showMsg){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success: </strong>' . $showMsg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark-subtle">
        <h5 class="modal-title" id="editModalLabel">Edit Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <form action="usersdata.php" method="post" class="Form SignIn">
          <div class="modal-body bg-primary-subtle">
            <!-- <h2>Registration Form</h2> -->

            <input type="hidden" name="srnoEdit" id="srnoEdit"/>
            <div class="inputBox my-3 mx-auto">
                <input type="text" id="firstnameEdit" name="firstnameEdit" required="required">
                <i class="fa-regular fa-user"></i>
                <span>First Name</span>
            </div>
            <div class="inputBox my-3 mx-auto">
                <input type="text" id="lastnameEdit" name="lastnameEdit" required="required">
                <i class="fa-regular fa-user"></i>
                <span>Last Name</span>
            </div>
            <div class="inputBox my-3 mx-auto">
                <input type="email" id="emailEdit" name="emailEdit" required="required">
                <i class="fa-regular fa-envelope"></i>
                <span>Emain Address</span>
            </div>
            <!-- <div class="inputBox my-3 mx-auto">
                <input type="submit" value="Update Record">
            </div> -->
          </div>
          <div class="modal-footer bg-dark-subtle">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
    </div>
  </div>
</div>


<!-- DELETE MODAL -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark-subtle">
        <h5 class="modal-title" id="deleteModalLabel">Delete Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <form action="usersdata.php" method="post" class="Form SignIn">
          <div class="modal-body bg-primary-subtle">
            <!-- <h2>Registration Form</h2> -->

            <input type="hidden" name="srnoDelete" id="srnoDelete"/>
            <p class="dltmsg">Are you sure you want to delete this record ?</p>
            
          </div>
          <div class="modal-footer bg-dark-subtle">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
          </div>
        </form>
    </div>
  </div>
</div>


<div class="container my-2">
<h2 class="my-4">Registered Emplyoyees List</h2>
<div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php

    // Fetching data from database

    $sql = "SELECT * FROM `registeredlist`";
    $result = mysqli_query($connect, $sql);
    $srNo = 0;      // used to show Sr. No. in sequence even after the delete data from database. 
    while($row = mysqli_fetch_assoc($result)){
        $srNo++;
        echo "<tr>
        <th scope='row'>". $srNo ."</th>
        <td>". $row['firstname'] ."</td>
        <td>". $row['lastname'] ."</td>
        <td>". $row['email'] ."</td>
        <td><button class='edit btn btn-sm btn-success' id=". $row['srno'] ." data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button> <button class='delete btn btn-sm btn-danger' id=del". $row['srno'] ." data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete</button></td>
      </tr>";
    }

 ?>

   <!-- <button class='edit btn btn-sm btn-success'>Edit</button>  -->
  </tbody>
</table>
</div>
</div>
    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>

      let edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element) => {
        element.addEventListener("click", (ele) =>{
            // console.log("edit",);
            let tr = ele.target.parentNode.parentNode;
            let firstName = tr.getElementsByTagName("td")[0].innerText;
            let lastName = tr.getElementsByTagName("td")[1].innerText;
            let email = tr.getElementsByTagName("td")[2].innerText;
            // console.log(firstName, lastName, email);
            firstnameEdit.value = firstName;
            lastnameEdit.value = lastName;
            emailEdit.value = email;
            srnoEdit.value = ele.target.id;
            console.log(ele.target.id);
            
        })
      })

      let deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (ele) =>{
            // console.log("delete",);
            $srnoid = ele.target.id.substr(3,);
            srnoDelete.value = $srnoid;
            console.log($srnoid);
            
        })
      })
    </script>
</body>
</html>