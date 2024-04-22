<?php 
    include('../include/connection.php');
    //aply condctions
    if(isset($_POST['insertbrandssubmit_btn'])){
        $brandtitle = $_POST['newbrands'];
        $sqlselect  = "select * from `brands` where brandname = '$brandtitle'";
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        $sqlnumber = mysqli_num_rows($sqlselectoutput);
        if($sqlnumber>0){
            echo '<script> alert("This Brand NAme is al-ready availible in database try other brand name!") </script>'; 
            die(mysqli_error($con));
        }
        else{
            if(empty($brandtitle)){
                //header('location:../admin_area/admin-dashboard.php?insert_brand');
                echo '<script> alert("Database Donot allow brand name is filed is empty all field is requir into database!") </script>';
                die(mysqli_error($con));
            }
            else{
                $sqlinsert = "insert into `brands` (brandname) values('$brandtitle')";
                $sqlinsertoutput = mysqli_query($con,$sqlinsert);
                if($sqlinsertoutput){
                    echo '<script> alert("new data inserted into database!") </script>';
                }
                else{
                    echo '<script> alert("Not new data inserted into database!") </script>';
                    die(mysqli_error($con));
                }
            }
        }
    }
    // else{
    //     echo '<script> alert("Please check flied is not work !") </script>';
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- projucts css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  -->
    <title>
        Insert New Brands
    </title>
</head>
<body>
    <div class="container">
        <h2>
            Add new Brands:
        </h2>
        <form class="py-2" action="#" method="post" enctype="multipart/form-data">
           <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
             <input type="text" class="form-control" placeholder="Insert New Brands" name="newbrands">
           </div>
           <div class="input-group flex-nowrap my-3">
                <button class="btn_insertsubmit bg-light btn" name="insertbrandssubmit_btn">Submit</button>
           </div>
        </form>
    </div>
</body>
</html>