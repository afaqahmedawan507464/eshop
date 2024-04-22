<?php
    include('../include/connection.php');
    //include('../common-funcation.php');
    if(isset($_GET['deleteadminid'])){
        $deleteadminid = $_GET['deleteadminid'];
        $select        = "select * from `admin_registration` where admin_userid = $deleteadminid";
        $selectoutput  = mysqli_query($con,$select);
        $selectrow     = mysqli_num_rows($selectoutput);
        if($selectrow>0){
           $delete        = "delete from `admin_registration` where admin_userid = $deleteadminid";
           $deleteoutput  = mysqli_query($con,$delete);
           if($deleteoutput){
            echo '<script>alert("Delete Admin Successfully")</script>';
            header('location:../index.php');
           }
           else{
            echo '<script>alert("Not User Founded")</script>';
            die(mysqli_error($con));
           }
        }


    }
?>