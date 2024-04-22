<?php
    include('../include/connection.php');
    if(isset($_GET['deleteuserid'])){
        $deleteuserid = $_GET['deleteuserid'];
        $selectuser   = "select * from `user_registration` where userid = $deleteuserid";
        $outputuser   = mysqli_query($con,$selectuser);
        $countuser    = mysqli_num_rows($outputuser);
        if($countuser>0){
            $deleteuser   = "delete from `user_registration` where userid = $deleteuserid";
            $outputdeleteuser   = mysqli_query($con,$deleteuser);
            if($outputdeleteuser){
                echo "<script>alert('User Removed Is Successfully')</script>";
                header('location:./admin_area/admin-dashboard.php?list_user');
            }
            else{
                echo "<script>alert('User Removed Is Un-Successfully')</script>";
                header('location:./admin_area/admin-dashboard.php?list_user');
            } 
        }
        else{
            echo "<script>alert('Not User Found')</script>";
            header('location:./admin_area/admin-dashboard.php?list_user');
            
        }
    }
?>