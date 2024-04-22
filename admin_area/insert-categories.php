<?php 
    include('../include/connection.php');
    //aply condctions
    if(isset($_POST['insertcategorysubmit_btn'])){
        $categorytitle = $_POST['newcategories'];
        $sqlselect = "select * from `categories` where categorytitle = '$categorytitle'";
        $sqlselectcategoryoutput = mysqli_query($con,$sqlselect);
        $sqlcondection = mysqli_num_rows($sqlselectcategoryoutput);
        if($sqlcondection>0){
            echo '<script> alert("This Category Is Al-Ready Avaible In Database!") </script>'; 
        }
        else{
            if(empty($categorytitle)){
                echo '<script> alert("Category name must be enter!") </script>';
                die(mysqli_error($con));
                header("location:../admin_area/admin-dashboard.php?insert_category");
            }
            else{
                $sqlinsert = "insert into `categories` (categorytitle) values('$categorytitle')";
                $sqlinsertcategoryoutput = mysqli_query($con,$sqlinsert);
                if($sqlinsertcategoryoutput){
                   echo '<script> alert("Insert data base new data!") </script>';
                 }
                else{
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
        Insert New Categories
    </title>
</head>
<body>
    <div class="container">
        <h2>
            Add new categories:
        </h2>
        <form class="py-2" action="#" method="post" enctype="multipart/form-data">
           <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
             <input type="text" class="form-control" placeholder="Insert New Categories" name="newcategories">
           </div>
           <div class="input-group flex-nowrap my-3">
                <button class="btn_insertsubmit bg-light btn" name="insertcategorysubmit_btn">Submit</button>
           </div>
        </form>
    </div>
</body>
</html>