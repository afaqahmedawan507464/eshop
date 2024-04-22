<?php
    include('../include/connection.php');
    $curipaddress  = getIPAddress();
    $fselect       = "select * from `user_registration` where useripaddress = '$curipaddress'";
    $fselectoutput = mysqli_query($con,$fselect);
    $fcountuser    = mysqli_num_rows($fselectoutput);
    if($fcountuser>0){
        $ffetchdata        = mysqli_fetch_assoc($fselectoutput);
        $old_user_image    = $ffetchdata['userimage'];
        $old_user_name     = $ffetchdata['username'];
        $old_email         = $ffetchdata['useremailaddress'];
        $old_user_contact  = $ffetchdata['usercontactnumber'];
        $old_user_address  = $ffetchdata['useraddress']; 
    }
    else{
        echo '<script>alert("This User Is Not Availible")</script>';
        echo '<script>window.open("../user_area/user-profile.php","_self")</script>';
    }


    if(isset($_POST['btn_update'])){
        $fselectupdate       = "select * from `user_registration` where useripaddress = '$curipaddress'";
        $fselectupdateoutput = mysqli_query($con,$fselectupdate);
        if($fselectupdateoutput){
            $updateimgname        = $_FILES["user_image"]["name"];
            $updateimgtmpname     = $_FILES["user_image"]["tmp_name"];
            $folderimage          = "userimage/".$updateimgname;
            move_uploaded_file($updateimgtmpname,$folderimage);
           // $update_user_image    = $_POST['user_image'];
            $update_user_name     = $_POST['user_name'];
            $update_email         = $_POST['email_address'];
            $update_user_contact  = $_POST['user_contact'];
            $update_user_address  = $_POST['user_address'];

            $update               = "update `user_registration` set 
            userimage             = '$folderimage',
            username              = '$update_user_name',
            useremailaddress      = '$update_email',
            usercontactnumber     = '$update_user_contact',
            useraddress           = '$update_user_address'
            ";
            $updateoutput         = mysqli_query($con,$update);
        }   if($updateoutput){
            echo '<script>alert("User Update Data Is Successfully")</script>';
            echo '<script>window.open("../user_area/user-profile.php","_self")</script>';
            }
        else{
            echo '<script>alert("This User Is Not Availible")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot strap css file -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- projucts css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- js file bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>
        Update Form
    </title>
</head>
<body>

    <!-- main section -->
    <main id="mainsection">
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Update User
            </h2>
           <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="UserImage" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image">
                <img src=<?php echo $old_user_image; ?> alt="" style="width:150px;height:150px;align-self:center;">
               </div>
              <div class="mb-3 w-50 m-auto">
                <label for="Username" class="form-label">User name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter Username" value=<?php echo $old_user_name; ?>>
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="Emailaddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" name="email_address" placeholder="Enter Emailaddress" value=<?php echo $old_email; ?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="usercontact" class="form-label">User Contact Information</label>
                <input type="text" class="form-control" name="user_contact" placeholder="123 1234567" value=<?php echo $old_user_contact; ?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="usercontact" class="form-label">User Address</label>
                <input type="text" class="form-control" name="user_address" placeholder="enter user address" value=<?php echo $old_user_address; ?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_update" class="btn btn-primary">Update User</button>
               </div>
          </form>
        </div>
    </div>

    <!-- footer section -->
    <!-- !footer section -->
</body>
</html>