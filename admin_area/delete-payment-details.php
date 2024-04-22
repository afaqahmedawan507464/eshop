<?php
    include('../include/connection.php');
    if(isset($_GET['deletepaymentid'])){
        $deletepaymentid = $_GET['deletepaymentid'];
        $selectpayment       = "select * from `payment_details` where payment_id = $deletepaymentid";
        $selectpaymentoutput = mysqli_query($con,$selectpayment);
        $paymentcount        = mysqli_num_rows($selectpaymentoutput);
        if($paymentcount>0){
            $delete              = "delete from `payment_details` where payment_id = $deletepaymentid";
            $deletepaymentoutput = mysqli_query($con,$delete);
            if($deletepaymentoutput){
                echo "<script>alert('Delete Payement Is Successfully')</script>";
                header('location:../admin_area/admin-dashboard.php?payment_detail');
            }
            else{
                echo "<script>alert('Delete Payement Is Un-Successfully')</script>";
                header('location:../admin_area/admin-dashboard.php?payment_detail');
            }
        }
    }
?>