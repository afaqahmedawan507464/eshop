<?php
include('./include/connection.php');
include('./common-funcation.php');
//session_start();
  if(isset($_POST['btn_login'])){
    $getuseraiaddress = getIPAddress();
    //variables
    $username     = $_POST['username']; 
    $password     = $_POST['password'];
    //select query
    $select       = "select * from `user_registration` where username = '$username'";
    $selectoutput = mysqli_query($con,$select);
    //checkconditions
    $check        = mysqli_num_rows($selectoutput);
    //fetchsomedata in database
    $fetchdata    = mysqli_fetch_assoc($selectoutput);
    $selectdata                 = "select * from `card_detailed` where ipaddress = '$getuseraiaddress'";
    $selectdataoutput           = mysqli_query($con,$selectdata);
    $checkdataralreaderavailble = mysqli_num_rows($selectdataoutput);
    //
    if($check>0){
        $_SESSION['username'] = $username;
        if(password_verify($password,$fetchdata['password'])){
            if($check == 1 && $checkdataralreaderavailble == 0){
                echo '<script>alert("Login Successfull")</script>';
                echo '<script>window.open("/eshopp/user_area/user-profile.php","_self")</script>';
            }
            else{
                echo '<script>alert("Login Successfull")</script>';
                echo '<script>window.open("/eshopp/user_area/payment-page.php","_self")</script>';
            }
        }
        else{
            echo '<script>alert("Please Check password")</script>';
            echo '<script>window.open("user-login.php")</script>';
        }
    }
    else{
        echo '<script>alert("Please Check username ")</script>';
        echo '<script>window.open("user-login.php")</script>';
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
        Login Form
    </title>
</head>
<body>

    <!-- main section -->
    <main id="mainsection">
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                User Login Form
            </h2>
           <form method="post" class="py-3" enctype="multipart/form-data" action="#">
               <div class="mb-3 w-50 m-auto">
                <label for="EmailAddress" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Usernamr" autocomplete="off">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="********" autocomplete="off">
               </div>
               <div class="mb-3  w-50 m-auto">
                  <a href="../user_area/user-login.php">Forget Password</a>
               </div>
               <div class="mb-3  w-50 m-auto">
                <p>If You HAve New User: <a href="/eshopp/user_area/user-registration.php">Registration Form</a></p>
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_login" class="btn btn-primary">Login</button>
               </div>
          </form>
        </div>
    </div>

    <!-- footer section -->
    <!-- !footer section -->
</body>
</html>