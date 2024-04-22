<?php
include('./include/connection.php');
include('./common-funcation.php');
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
        Payment Page
    </title>
</head>
<body>
    <div class="container mt-5 mb-4">
        <h2 class="text-center">Choose Payment Method</h2>
        <div class="row my-2">
            <div class="col-md-6 py-5">
            <a href="https://www.payoneer.com"><img class="w-100 h-100" src="./image/payonline.jpg"></a>
            </div>
            <div class="col-md-6 py-5">
                <!-- fetch user id by using php code -->
                <?php
                    $fetchuseripaddress = getIPAddress();
                    $select             = "select * from `user_registration` where useripaddress = '$fetchuseripaddress'";
                    $selectoutput       = mysqli_query($con,$select);
                    $finduser           = mysqli_num_rows($selectoutput);
                    if($finduser>0){
                    $fetchuser          = mysqli_fetch_array($selectoutput);
                    }

                ?>
            <a href="user_area/offline-payment.php?userid=<?php echo $fetchuser['userid']; ?>"><img class="w-100 h-100" src="./image/payoffline.jpg"></a>
            </div>
        </div>
    </div>
</body>
</html>