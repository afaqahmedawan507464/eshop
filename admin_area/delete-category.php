<?php
  include('../include/connection.php');
  if(isset($_GET['deletecategoryid'])){
    $deletecategoryid =  $_GET['deletecategoryid'];
     //echo $deletebrandid;
       // checking if this brands is availible any product then not deleted
     $selectproducts       = "select * from `products` where productscategory = $deletecategoryid";
     $selectproductsoutput = mysqli_query($con,$selectproducts);
     $row                  = mysqli_num_rows($selectproductsoutput);
     if($row>0){
        echo '<script>alert("This Category Related Product Is Availible In This System")</script>';
        header('location:admin-dashboard.php');
       // echo '<script>window.open("eshopp/admin_area/admin-dashboard.php?view_brand")</script>';
        die(mysqli_error($con));
     }
     else{
            $selectcategory       = "select * from `categories` where categoryid = $deletecategoryid";
            $selectcategoryoutput = mysqli_query($con,$selectcategory);
            $rowcategory          = mysqli_num_rows($selectcategoryoutput);
            if($rowcategory>0){
            $deletecategory        = "delete from `categories` where categoryid = $deletecategoryid";
            $deletecategoryoutput = mysqli_query($con,$deletecategory);
            if($deletecategoryoutput){
                echo '<script>alert("This Category Is Deleted")</script>';
                header('location:../admin_area/admin-dashboard.php?view_category');
            }
            else{
                echo '<script>alert("This Category Is Not Deleted")</script>';
                header('location:../admin_area/admin-dashboard.php?view_category');
                die(mysqli_error($con));
            }
           }
        
        }
  }
?>