<?php
 include('../include/connection.php');
 $user_ipaddress = getIPAddress();
 $select         = "select * from `admin_registration` where admin_ipaddress = '$user_ipaddress'";
 $selectoutput   = mysqli_query($con,$select);
 if($selectoutput){
    $fetch       = mysqli_fetch_assoc($selectoutput);
    $userid      = $fetch['admin_userid'];
 }
 else{
    echo '<h2 class="text-center text-success">Not User Founded</h2>';
    die(mysqli_error($con));
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <title>
        Delete user account
    </title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <h2 class="text-center text-danger my-5">
                Delete Account Form
            </h2>
            <div class="d-flex">
            <div class="col-md-6">
                <a href="../admin_area/delete-admin-user.php?deleteadminid=" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="submit" class="btn border-1 w-100 bg-danger text-white">
                    Delete Account
                </a>
            </div>
            <div class="col-md-6 mx-2">
                <a href="../admin_area/admin-dashboard.php?nodeleteadminid=" type="submit" class="btn border-1 w-100 border-black" name="btn_nodelete">
                   Don't Delete Account
                </a>
            </div>
            </div>
            
            </form>
        </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Account Conformation</h1>
      </div>
      <div class="modal-body">
        <h4>Are You Sure Delete This Account?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-decoration-none text-white" href="../admin_area/delete-admin-user.php">No</a></button>
        <button type="button" class="btn btn-primary text-white text-decoration-none"><a class="text-decoration-none text-white" href="../admin_area/delete-admin-user.php?deleteadminid=<?php echo $userid;?>">Yes Sure</a></button>
      </div>
    </div>
  </div>
</div>
    </div>
</body>