<?php 
  include('../include/connection.php');
  include('../common-funcation.php');
  session_start();
  $user_ipaddress = getIPAddress();
  if(isset($_POST['btn_login'])){
    $username          = $_POST['username'];
    $password          = $_POST['password'];
    $selectadmin       = "select * from `admin_registration` where admin_ipaddress = '$user_ipaddress'";
    $selectadminoutput = mysqli_query($con,$selectadmin);
    $funcationfetch    = mysqli_fetch_assoc($selectadminoutput);
    $userfetch         = $funcationfetch['admin_username'];
    $passfetch         = $funcationfetch['admin_password']; 
    $rowcount          = mysqli_num_rows($selectadminoutput);
    if($rowcount>0){
        if($username == '' or $password == ''){
            echo '<script>alert("Must Be Enter Username And Password Field")</script>';
            header('location:../admin_area/admin-login.php');
            die(mysqli_error($con));  
        }
        else{
            if(password_verify($password,$passfetch)){
                $_SESSION['adminusername'] = $username;
                if($username == $userfetch){
                echo '<script>alert("Login SuccessfullY")</script>';
                header('location:../admin_area/admin-dashboard.php');
                }
                else{
                    echo '<script>alert("User Name Is Not Match")</script>';
                    header('location:../admin_area/admin-login.php');
                    die(mysqli_error($con));  
                }
            }
            else{
                echo '<script>alert("password is not match")</script>';
                header('location:../admin_area/admin-login.php');
                die(mysqli_error($con)); 
            }
        }
    }
    else{
        echo '<script>alert("This User Is Not Founded")</script>';
        die(mysqli_error($con));
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
                Admin Login Form
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
                <p>If You HAve New User: <a href="../admin_area/admin_registration.php">Registration Form</a></p>
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