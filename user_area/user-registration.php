<?php
include('../include/connection.php');
include('../common-funcation.php');
if(isset($_POST['btn_registration'])){
  $getuseraiaddress = getIPAddress();
  //work image section
  $userimagename     = $_FILES["user_image"]["name"];
  $userimagetempname = $_FILES["user_image"]["tmp_name"];
  $foldername        = "userimage/".$userimagename;
  //working other variables
  $username      = $_POST['user_name'];
  $email_address = $_POST['email_address'];
  $password      = $_POST['password'];
  $pashash       = password_hash($password,PASSWORD_DEFAULT);
  $con_password  = $_POST['conform_password'];
  $user_contact  = $_POST['user_contact'];
  $user_address  = $_POST['user_address'];
  //select query
  $select = "select * from `user_registration` 
  where userimage         = '$foldername' or
        username          = '$username' or
        useremailaddress  = '$email_address' or
        useripaddress     = '$getuseraiaddress' or
        usercontactnumber = '$user_contact'";
  $selectoutput = mysqli_query($con,$select);
  $checkuseralreaderavailble = mysqli_num_rows($selectoutput);
  if($checkuseralreaderavailble>0){
    echo '<script>alert("This User Is Al-Ready Registered")</script>';
    echo '<script>window.open("user-login.php")</script>';
  }else{
    if($foldername == '' or $username == '' or $email_address == '' or $password == '' or $con_password == '' or $user_contact == '' or $user_address == ''){
      echo '<script>alert("After Submission all field is required")</script>';
      echo '<script>window.open("user-registration.php")</script>';
    }
    else if($password!=$con_password){
      echo '<script>alert("User password and conform password is not match")</script>';
      echo '<script>window.open("user-registration.php")</script>';
    }
    else{
      move_uploaded_file($userimagetempname,$foldername);
      //insert query
      $insert = "insert into `user_registration` 
      (
        userimage,
        username,
        useremailaddress,
        password,
        useripaddress,
        useraddress,
        usercontactnumber
        ) 
        values(
          '$foldername',
          '$username',
          '$email_address',
          '$pashash',
          '$getuseraiaddress',
          '$user_address',
          '$user_contact'
          )";
      $insertoutput = mysqli_query($con,$insert);
      if($insertoutput){
        echo '<script>alert("New User Registered")</script>';
        $selectcard                 = "select * from `card_detailed` where ipaddress = '$getuseraiaddress'";
        $selectcardoutput           = mysqli_query($con,$selectcard);
        $checkcardralreaderavailble = mysqli_num_rows($selectcardoutput);
        if($checkcardralreaderavailble>0){
          $_SESSION['username'] = $username;
          echo '<script>alert("items found in your card")</script>';  
        }
        else{
          echo '<script>alert("not items found in your card")</script>';  
        }
        //echo '<script>alert("New User Registered")</script>';
        //echo '<script>window.open("user-login.php")</script>';
      }
      else{
        echo '<script>alert("User Registration Error")</script>';
        echo '<script>window.open("user-registration.php")</script>';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot strap css file -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- projucts css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- js file bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>
        Registration Form
    </title>
</head>
<body>

    <!-- main section -->
    <main id="mainsection">
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Registration New User
            </h2>
           <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="UserImage" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image">
               </div>
              <div class="mb-3 w-50 m-auto">
                <label for="Username" class="form-label">User name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter Username">
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="Emailaddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" name="email_address" placeholder="Enter Emailaddress">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Conform Password" class="form-label">Conform Password</label>
                <input type="text" class="form-control" name="conform_password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="usercontact" class="form-label">User Contact Information</label>
                <input type="text" class="form-control" name="user_contact" placeholder="123 1234567">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="useraddress" class="form-label">User Address</label>
                <textarea  class="form-control" name="user_address" placeholder="Enter Address" cols="30" rows="5"></textarea>
               </div>
               <div class="mb-3  w-50 m-auto">
                  <a href="#">Forget Password</a>
               </div>
               <div class="mb-3  w-50 m-auto">
                <p>If You HAve Al-Ready Register Then: <a href="/eshopp/user_area/user-login.php">Login Form</a></p>
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_registration" class="btn btn-primary">Registration User</button>
               </div>
          </form>
        </div>
    </div>

    <!-- footer section -->
    <!-- !footer section -->
</body>
</html>