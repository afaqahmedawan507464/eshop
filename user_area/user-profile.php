<?php
  include('../include/connection.php');
  include('../common-funcation.php');
  session_start();
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
        User Dashboard
    </title>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <!-- Insert All detailed About Dashboard Admin Panel -->
                <div class=" d-flex justify-content-center align-items-center">
                    <?php 
                    $currentuseripaddress = getIPAddress();
                        $selectuser       = "select * from `user_registration` where useripaddress = '$currentuseripaddress'";
                        $selectoutputuser = mysqli_query($con,$selectuser);
                        if($selectoutputuser){
                            $fetchuserimage = mysqli_fetch_assoc($selectoutputuser);
                            $userimage      = $fetchuserimage['userimage'];
                            $username       = $fetchuserimage['username'];
                        }
                    ?>
                <img style="border-radius: 50%;height:150px;width:150px;" src=<?php echo $userimage; ?> alt="">
                <h4 class="text-center">Welcome <?php echo $username;  ?></h4>
                </div>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../user_area/user-profile.php?pendingorders">My Pending Order Detailes</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../user_area/user-profile.php?orderdetailes">My Order Detailes</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../user_area/user-profile.php?updateuseraccount">Update Account Detailes</a></button>
                <hr>
                <button class="btn_delete btn align-self-center bg-danger w-100"><a class="text-decoration-none text-white" href="../user_area/user-profile.php?deleteuseraccount">Delete Account</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../logout.php">Logout Account</a></button>
                <hr>
            </div>
            <div class="col-md-10">
                <!-- other area detailed in dashboard -->
                <h2 class="text-center pt-5">
                   Manage All Details
                </h2>
                <div class="container py-5">
                    <?php
                        $selectpendingorder       = "select * from `order_pending` where user_ipaddress = '$currentuseripaddress'";
                        $selectpendingorderoutput = mysqli_query($con,$selectpendingorder);
                        $selectpendingrows = mysqli_num_rows($selectpendingorderoutput);
                        if($selectpendingrows>0){
                            echo "<h2 class='text-success text-center'>Your Pending Orders =<span class='text-danger'>$selectpendingrows</span></h2>
                            <br />
                            <a href='../user_area/user-profile.php?pendingorders' class='text-center text-danger'>Pending Order Detailes</a>";
                        }
                        
                    ?>





                  <?php
                    if(isset($_GET['pendingorders'])){
                        include('../user_area/pending-order.php');
                    }
                    if(isset($_GET['orderdetailes'])){
                        include('../user_area/order-detailes.php');
                    }
                    if(isset($_GET['updateuseraccount'])){
                        include('../user_area/update-user.php');
                    }
                    if(isset($_GET['deleteuseraccount'])){
                        include('../user_area/delete-user.php');
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>