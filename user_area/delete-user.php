<?php
include('../include/connection.php');
//session_start();
  $ipaddress = getIPAddress();
  if(isset($_POST['btn_delete'])){
    $selectdeluser       = "select * from `user_registration` where useripaddress = '$ipaddress'";
    $selectdeluseroutput = mysqli_query($con,$selectdeluser);
    $selectuserrow       = mysqli_num_rows($selectdeluseroutput);
    if($selectuserrow>0){
        $delete       = "delete from `user_registration` where useripaddress = '$ipaddress'";
        $deleteoutput = mysqli_query($con,$delete);
        if($deleteoutput){
            session_destroy();
           echo '<script>alert("User Deleted.")</script>';
           echo '<script>window.open("../index.php","_self")</script>';
        }
        else{
            echo '<script>alert("User Not Deleted.")</script>';
        }
    }  
    else{
        echo '<script>alert("This User Is Not Availible")</script>';
        echo '<script>window.open("../user_area/user-profile.php?deleteuseraccount","_self")</script>';
    }
  }

  if(isset($_POST['btn_nodelete'])){
    echo '<script>window.open("../user_area/user-profile.php","_self")</script>';
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
        Delete user account
    </title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <h2 class="text-center text-danger my-5">
                Delete Account Form
            </h2>
            <div class="d-flex">
            <div class="col-md-6">
                <button type="submit" class="btn border-1 w-100 bg-danger text-white" name="btn_delete">
                    Delete Account
                </button>
            </div>
            <div class="col-md-6 mx-2">
                <button type="submit" class="btn border-1 w-100 border-black" name="btn_nodelete">
                   Don't Delete Account
                </button>
            </div>
            </div>
            </form>
        </div>
    </div>
</body>