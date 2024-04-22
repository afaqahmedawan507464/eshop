<?php
  include('../include/connection.php');
  if(isset($_GET['deletebrandid'])){
    $deletebrandid =  $_GET['deletebrandid'];
     //echo $deletebrandid;
       // checking if this brands is availible any product then not deleted
     $selectproducts       = "select * from `products` where productsbrands = $deletebrandid";
     $selectproductsoutput = mysqli_query($con,$selectproducts);
     $row                  = mysqli_num_rows($selectproductsoutput);
     if($row>0){
        echo '<script>alert("This Brand Related Product Is Availible In This System")</script>';
        header('location:admin-dashboard.php');
       // echo '<script>window.open("eshopp/admin_area/admin-dashboard.php?view_brand")</script>';
        die(mysqli_error($con));
     }
     else{
            $selectbrands       = "select * from `brands` where brandsid = $deletebrandid";
            $selectbrandsoutput = mysqli_query($con,$selectbrands);
            $rowbrands          = mysqli_num_rows($selectbrandsoutput);
            if($rowbrands>0){
            $deletebrand        = "delete from `brands` where brandsid = $deletebrandid";
            $deletebrandsoutput = mysqli_query($con,$deletebrand);
            if($deletebrandsoutput){
                echo '<script>alert("This Brand Is Deleted")</script>';
                header('location:../admin_area/admin-dashboard.php?view_brand');
            }
            else{
                echo '<script>alert("This Brand Is Not Deleted")</script>';
                header('location:../admin_area/admin-dashboard.php?view_brand');
                die(mysqli_error($con));
            }
           }
        
        }
  }
?>