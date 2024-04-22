<?php
    $con = new mysqli ('localhost','root','','estore');
    if(!$con){
        echo '<script> alert("Data BAse Connected in php Un-sucessfully Try Again !") </script>';
        die(mysqli_error($con));
    }
?>