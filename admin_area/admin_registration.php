<?php
  include('../include/connection.php');
  include('../common-funcation.php');
  session_start();
  $user_ipaddress = getIPAddress();
  if(isset($_POST['btn_registration'])){
     $userimagename     = $_FILES['user_image']['name'];
     $userimagetmpname = $_FILES['user_image']['tmp_name'];
     $foldername         = "adminimage/".$userimagename;
     //
     $admin_username      = $_POST['user_name'];
     $admin_email         = $_POST['email_address'];
     $admin_password      = $_POST['password'];
     $password_hash       = password_hash($admin_password,PASSWORD_DEFAULT);
     $admin_con_password  = $_POST['conform_password'];
     //
     $selectadmin         = "select * from `admin_registration` where admin_ipaddress = '$user_ipaddress'";
     $selectadminoutput   = mysqli_query($con,$selectadmin);
     $selectrow           = mysqli_num_rows($selectadminoutput);
     if($selectrow>0){
        echo '<script>alert("This User Is Al-Ready Availible In This System")</script>';
     }
     else{
        if($foldername == '' or $admin_username == '' or $admin_password == '' or $admin_con_password == ''){
            echo '<script>alert("All Field Is Required Must Be Enter")</script>';
            die(mysqli_error($con));
        }
        else if($admin_password != $admin_con_password){
            echo '<script>alert("Password And Conform Password Is Not Match Password Put AGain")</script>';
            die(mysqli_error($con));
        }
        else{
         $_SESSION['adminusername'] = $admin_username;
         move_uploaded_file($userimagetmpname,$foldername);
         $insert          = "insert into `admin_registration` 
         (
            admin_image,
            admin_username,
            admin_email,
            admin_password,
            admin_ipaddress
         ) 
         values (
                '$foldername',
                '$admin_username',
                '$admin_email',
                '$password_hash',
                '$user_ipaddress'
         )";
         $insertoutput    = mysqli_query($con,$insert);
         if($insertoutput){
            echo '<script>alert("New Admin Add In This System")</script>';
            header('location:../admin_area/admin-login.php');
         }
         else{
            echo '<script>alert("Inserted Operation Failed")</script>';
            die(mysqli_error($con));
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
                Registration New Admin
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
                <input type="password" class="form-control" name="password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Conform Password" class="form-label">Conform Password</label>
                <input type="password" class="form-control" name="conform_password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                  <a href="#">Forget Password</a>
               </div>
               <div class="mb-3  w-50 m-auto">
                <p>If You HAve Al-Ready Register Then: <a href="../admin_area/admin-login.php">Login Form</a></p>
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