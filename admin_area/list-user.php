<?php
   include('../include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot strap css file -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- projucts css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- js file bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>
        User page
    </title>
</head>
<body>
    <!-- header section -->
   
    <!-- !header section -->


    <!-- main section -->
    <main id="mainsection">
        <div class="container-fluid py-3">
            <div class="container-fluid">
                <h2 class="text-center">
                    User List
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">
                    <?php
                       $select       = "select * from `user_registration`";
                       $selectoutput = mysqli_query($con,$select);
                       $usercount    = mysqli_num_rows($selectoutput);
                       if($usercount>0){
                         echo '
                         <tr>
                             <th>User Id</th>
                             <th>User Name</th>
                             <th>Email Address</th>
                             <th>User Image</th>
                             <th>User Ip Address</th>
                             <th>User Address</th>
                             <th>User Number</th>
                             <th>Delete</th>
                           </tr>
                         ';
                         while($userdata = mysqli_fetch_assoc($selectoutput)){
                            $userid            = $userdata['userid'];
                            $username          = $userdata['username'];
                            $useremailaddress  = $userdata['useremailaddress'];
                            $userimage         = $userdata['userimage'];
                            $useripaddress     = $userdata['useripaddress'];
                            $useraddress       = $userdata['useraddress'];
                            $usercontactnumber = $userdata['usercontactnumber'];
                            ?>
                            
                            <tr>
                             <td><?php echo $userid; ?></td>
                             <td><?php echo $username; ?></td>
                             <td><?php echo $useremailaddress; ?></td>
                             <td><img src="../user_area/<?php echo $userimage; ?>" style="width:100px;height:100px"></td>
                             <td><?php echo $useripaddress; ?></td>
                             <td><?php echo $useraddress; ?></td>
                             <td><?php echo $usercontactnumber; ?></td>
                             <td><?php echo "<a href='../admin_area/delete-user.php?deleteuserid=$userid' class='fa-solid fa-trash text-black'></i></a>";?></td>
                            </tr> 
                            <?php
                         }
                       }
                       else{
                        echo '<h2 class="text-center text-success">No Users Record Founded</h2>';
                       }
                    ?>     
                </table>
            </form>
                  </div>
                </div>              
            </div>
        </div>
    </main>
    <!-- !main section -->


    <!-- footer section -->
  
    <!-- !footer section -->
</body>
</html>