<?php
  include('../include/connection.php');
  include('../common-funcation.php');

  $currentipaddress = getIPAddress();
  $totalprice       = 0;
  $invoicenumber    = mt_rand();
  $status           = 'pending'; 
  if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $selectcarditem         = "select * from `card_detailed` where ipaddress = '$currentipaddress'";
    $selectcarditemsoutput  = mysqli_query($con,$selectcarditem);
    $fetchproductcount      = mysqli_num_rows($selectcarditemsoutput);
    if($fetchproductcount>0){
        while($fetchdatadetail    = mysqli_fetch_array($selectcarditemsoutput)){
            $productid            = $fetchdatadetail['productid'];
            //$productsqtv          = $fetchdatadetail['qtv'];
            $selectproducts       = "select * from `products` where productid = $productid";
            $selectproductsoutput = mysqli_query($con,$selectproducts);
            $fetchproducts        = mysqli_num_rows($selectproductsoutput);
            if($fetchproducts>0){
                while($fetchproductprice = mysqli_fetch_array($selectproductsoutput)){
                    $productprice        = array($fetchproductprice['productprice']); 
                    $productspricevalues = array_sum($productprice);
                    $totalprice+=$productspricevalues;
                }
            }
            
        }
    } 



    //conditions check and fetch product qtv
    $selectproductqtv       = "select * from `card_detailed` where ipaddress = '$currentipaddress'";
    $selectproductqtvoutput = mysqli_query($con,$selectproductqtv);
    $fetchproductqtv        = mysqli_fetch_array($selectproductqtvoutput);
    $qtv = $fetchproductqtv['qtv'];
    if($qtv == 0){
        $qtv = 1;
        $subtotal = $totalprice;
    }
    else{
        $qtv = $qtv;
        $subtotal = $totalprice*$qtv;
    }

    //insert query
    $selectquery        = "select * from `order_table` where user_ipaddress = '$currentipaddress'";
    $selectqueryoutput  = mysqli_query($con,$selectquery);
    $countrow           = mysqli_num_rows($selectqueryoutput);
    if($countrow>0){
        echo '<script>alert("This Product Is Al-Ready Availible In Order")</script>';
        echo '<script>window.open("../user_area/user-profile.php?orderdetailes","_self")</script>';
        die(mysqli_error($con));
    }
    else{
     $insertorderdetails = "insert into `order_table`
    (
        product_id,
        user_id,
        user_ipaddress,
        due_amount,
        invoice_number,
        total_products,
        order_date,
        order_status,
        qtv
    )
    values(
        $productid  ,
        $userid,
        '$currentipaddress',
        $subtotal,
        $invoicenumber,
        $fetchproductcount,
        NOW(),
        '$status',
        $qtv
    )";
    $insertoutput = mysqli_query($con,$insertorderdetails);
    if($insertoutput){
        echo '<script>alert("Your Order Is submitted now")</script>';
        header('location:../user_area/user-profile.php?orderdetailes');
    }
    else{
        echo '<script>alert("Your Order Is submitted error")</script>';
        die(mysqli_error($con));
    }
    }
    
//   } 
//   // insert data in pending table
  $selectquery        = "select * from `order_pending` where user_ipaddress = '$currentipaddress'";
  $selectqueryoutput  = mysqli_query($con,$selectquery);
  $countrow           = mysqli_num_rows($selectqueryoutput);
  if($countrow>0){
      echo '<script>alert("This Product Is Al-Ready Availible In Order")</script>';
      echo '<script>window.open("../user_area/user-profile.php?orderdetailes","_self")</script>';
  }
  else{
  $insertorderdetails = "insert into `order_pending`
    (
        product_id,
        user_id,
        user_ipaddress,
        due_amount,
        invoice_number,
        total_products,
        order_date,
        order_status,
        qtv
    )
    values(
        $productid,
        $userid,
        '$currentipaddress',
        $subtotal,
        $invoicenumber,
        $fetchproducts,
        NOW(),
        '$status',
        $qtv
    )";
    $insertoutput = mysqli_query($con,$insertorderdetails);
    if($insertoutput){
        echo '<script>window.open("../user_area/user-profile.php?orderdetailes","_self")</script>';
    }
    }


    echo "<script>alert('$productid')</script>";

    //delete data when card items page empty
    $deleteproduct       = "delete  from `card_detailed` where ipaddress = '$currentipaddress'";
    $deleteproductoutput = mysqli_query($con,$deleteproduct);
    if($deleteproductoutput){
        echo '<script>window.open("../user_area/user-profile.php?orderdetailes","_self")</script>';
    }
}

?>