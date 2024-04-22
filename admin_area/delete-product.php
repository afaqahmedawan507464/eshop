<?php
  include('../include/connection.php');
  if(isset($_GET['deleteproductid'])){
    $deleteproductid = $_GET['deleteproductid'];
    $selectorderdata = "select * from `order_table` where product_id = $deleteproductid";
    $orderoutput     = mysqli_query($con,$selectorderdata);
    $ordercountrow   = mysqli_num_rows($orderoutput);
    if($ordercountrow>0){
        $delete      = "delete from `order_table` where product_id = $deleteproductid";
        $deleteoutput = mysqli_query($con,$delete);
        if($deleteoutput){
            echo '<script>alert("1 data delete in order table")</script>';
            echo '<script>window.open("../admin_area/view-product.php")';
        }
        else{
            echo '<script>alert("Delete data in order table")</script>';
            echo '<script>window.open("../admin_area/view-product.php")';
        }
    }
    else{
        echo '<script>alert("Not Data Found For Delete")</script>';
        echo '<script>window.open("../admin_area/view-product.php")';
    }
  }
?>