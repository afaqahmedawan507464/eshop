<?php
   include('../include/connection.php');
   $fetchuseripaddress  = getIPAddress();
     $select             = "select * from `admin_registration` where admin_ipaddress = '$fetchuseripaddress'";
     $selectoutput       = mysqli_query($con,$select);
     $row                = mysqli_num_rows($selectoutput);
     if($row>0){
        $fetchdataupdate = mysqli_fetch_assoc($selectoutput);
        $userimage       = $fetchdataupdate['admin_image'];
        $username        = $fetchdataupdate['admin_username'];
        $useremail       = $fetchdataupdate['admin_email'];
        $password        = $fetchdataupdate['admin_password'];
        $hashpassword    = password_verify('',$password);
        //echo $hashpassword;
     }
     else{
        echo '<h2 class="text-center text-success">Users Not Founded</h2>';
     }
   if(isset($_POST['btn_update'])){
    $fetchuseripaddress  = getIPAddress();
     $select             = "select * from `admin_registration` where admin_ipaddress = '$fetchuseripaddress'";
     $selectoutput       = mysqli_query($con,$select);
     $row                = mysqli_num_rows($selectoutput);
     if($row>0){
        $newimagename        = $_FILES['user_image']['name'];
        $newimagetempname    = $_FILES['user_image']['tmp_name'];
        $updatefoldername    = "adminimage/".$newimagename;
        
        $updateusername      = $_POST['user_name']; 
        $updateemail         = $_POST['email_address']; 
        $updatepassword      = $_POST['password'];
        $updatehashpassword  = password_hash($updatepassword,PASSWORD_DEFAULT);

        move_uploaded_file($newimagetempname,$updatefoldername);
        $update               = "update `admin_registration` 
        set
        admin_image           = '$updatefoldername',
        admin_username        = '$updateusername',
        admin_email           = '$updateemail',
        admin_password        = '$updatehashpassword'";
        $updateoutput         = mysqli_query($con,$update);
        if($updateoutput){
          echo '<script>alert("Admin user data updated .")</script>';
          header('location:../admin_area/admin-dashboard.php');
        }
        else{
          echo '<script>alert("Admin user data not updated .")</script>';
        }
     }
     else{
        echo '<h2 class="text-center text-success">Users Not Founded</h2>';
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
        Update Form
    </title>
</head>
<body>

    <!-- main section -->
    <main id="mainsection">
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Update Admin
            </h2>
            <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="UserImage" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image">
                <img src=<?php echo $userimage; ?> alt="" style="width:150px;height:150px;">
               </div>
              <div class="mb-3 w-50 m-auto">
                <label for="Username" class="form-label">User name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter Username" value=<?php echo $username; ?>>
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="Emailaddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" name="email_address" placeholder="Enter Emailaddress" value=<?php echo $useremail; ?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="********"value=<?php echo $hashpassword; ?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_update" class="btn btn-primary">Update User</button>
               </div>
          </form>
        </div>
    </div>

    <!-- footer section -->
    <!-- !footer section -->
</body>
</html>