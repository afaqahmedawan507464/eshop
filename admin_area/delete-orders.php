<?php
 include('../include/connection.php');
 if(isset($_GET['deleteorderid'])){
    $orderdeleteid     = $_GET['deleteorderid'];
    $selectorder       = "select * from `order_table` where order_id=$orderdeleteid";
    $selectorderoutput = mysqli_query($con,$selectorder);
    $orderscount       = mysqli_num_rows($selectorderoutput);
    if($orderscount>0){
        $deleteorder   = "delete from `order_table` where order_id=$orderdeleteid";
        $deleteorderoutput = mysqli_query($con,$deleteorder);
        $deleteordercount  = mysqli_num_rows($deleteorderoutput);
        if($deleteordercount>0){
            echo "<script>alert('Order Deleted')</script>";
            header('location:../admin_area/admin-dashboard.php?order_detail');
        }
        else{
            echo "<script>alert('Order Not Deleted')</script>";
            header('location:../admin_area/admin-dashboard.php?order_detail');
        }
    }
    else{
        echo "<script>alert('Order Not Found')</script>";
    }
 }
?>