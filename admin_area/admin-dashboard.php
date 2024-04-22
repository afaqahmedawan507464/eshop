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
    <link rel="stylesheet" href="../css/style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- js file bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <!-- header sections -->
    <header id="headersection" class="pb-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
           <a class="navbar-brand" href="#" class="mx-2"><img src="../image/logo.png" alt=""></a>
            </div>
            </div>
       </nav>
    </header>
    <!-- !header sections -->

    <!-- main sections -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <!-- Insert All detailed About Dashboard Admin Panel -->
                <div class=" d-flex justify-content-center align-items-center">
             <?php
                   $user_ipaddress = getIPAddress();
                          $select  = "select * from `admin_registration` where admin_ipaddress = '$user_ipaddress'";
                     $selectoutput = mysqli_query($con,$select);
                     $fetch = mysqli_fetch_assoc($selectoutput);
                            $username = $fetch['admin_username'];
                            $image    = $fetch['admin_image'];
             ?>
                <img style="border-radius: 50%;height:150px;width:150px;" src=<?php echo $image; ?> alt="">
                <h4 class="text-center">Welcome <?php
                   if(isset($_SESSION['adminusername'])){
                     echo $_SESSION['adminusername'];
                   }
                   else{
                    echo 'Admin';
                   }
                ?></h4>
                </div>
                <hr>
                <button class="btn_normal btn align-self-center bg-light border-1 w-100"><a href="insert-products.php">Insert Products</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?view_product">View Products</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?insert_category">Insert Category</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?view_category">View Category</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?insert_brand">Insert Brands</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?view_brand">View Brands</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?order_detail">All Orders Details</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?payment_detail">All Payment Details</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?list_user">List Of Users</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../admin_area/admin-dashboard.php?update_adminaccount">Update Admin Account Detailes</a></button>
                <hr>
                <button class="btn_delete btn align-self-center bg-danger w-100"><a class="text-decoration-none text-white" href="../admin_area/admin-dashboard.php?delete_admin">Delete Admin Account</a></button>
                <hr>
                <button class="btn_normal btn align-self-center bg-light w-100"><a class="text-decoration-none text-black" href="../logout.php">Logout Admin Account</a></button>
                <hr>
            </div>
            <div class="col-md-10">
                <!-- other area detailed in dashboard -->
                <h2 class="text-center pt-5">
                   Manage All Details
                </h2>
                <div class="container py-5">
                  <?php
                    if(isset($_GET['insert_category'])){
                      include('../admin_area/insert-categories.php');
                    }
                    if(isset($_GET['insert_brand'])){
                      include('../admin_area/insert-brands.php');
                    }
                    if(isset($_GET['view_product'])){
                        include('../admin_area/view-products.php');
                    }
                    if(isset($_GET['view_category'])){
                        include('../admin_area/view-category.php');
                    }
                    if(isset($_GET['view_brand'])){
                        include('../admin_area/view-brand.php');
                    }
                    if(isset($_GET['order_detail'])){
                        include('../admin_area/order-detail.php');
                    }
                    if(isset($_GET['payment_detail'])){
                        include('../admin_area/payment-detail.php');
                    }
                    if(isset($_GET['list_user'])){
                        include('../admin_area/list-user.php');
                    }
                    if(isset($_GET['update_adminaccount'])){
                        include('../admin_area/update-admin.php');
                    }
                    if(isset($_GET['delete_admin'])){
                        include('../admin_area/delete-admin.php');
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>
    <!-- !main sections -->

    <!-- footer section -->
    <footer id="footersection">
        <div class="container-fluid bg-light py-3">
            <p class="text-center">
                &copy; 2023 all design by abc
            </p>
        </div>
    </footer>
    <!-- !footer section -->
</body>
</html>