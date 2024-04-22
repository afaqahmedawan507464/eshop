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
        Pending Order page
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
                    Your Pending Orders
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">
                    <?php
                        //
                        
                        //use code
                        $usercurrentipaddress = getIPAddress();
                        $selectorderpen       = "select * from `order_pending` where user_ipaddress = '$usercurrentipaddress'";
                        $selectorderpenoutput = mysqli_query($con,$selectorderpen);
                        $selectpenrow         = mysqli_num_rows($selectorderpenoutput);
                        if($selectpenrow>0){
                          echo  "
                          <tr>
                             <th>Order Id</th>
                             <th>User Id</th>
                             <th>User Ip Address</th>
                             <th>Amount Due</th>
                             <th>Invoice Number</th>
                             <th>Total Products</th>
                             <th>Order Date</th>
                             <th>Order Status</th>
                             <th>Quantity</th>
                           </tr> ";
                          while($fetchpendingorders = mysqli_fetch_array($selectorderpenoutput)){
                            $order_id        = $fetchpendingorders['order_id'];
                            $user_id         = $fetchpendingorders['user_id'];
                            $userip_address  = $fetchpendingorders['user_ipaddress'];
                            $amount_due      = $fetchpendingorders['due_amount'];
                            $invoice_no      = $fetchpendingorders['invoice_number'];
                            $total_products  = $fetchpendingorders['total_products'];
                            $order_date      = $fetchpendingorders['order_date'];
                            $order_status    = $fetchpendingorders['order_status'];
                            $qtv             = $fetchpendingorders['qtv'];
                            echo  "
                          <tr>
                             <td>$order_id</td>
                             <td>$user_id</td>
                             <td>$userip_address</td>
                             <td>$amount_due</td>
                             <td>$invoice_no</td>
                             <td>$total_products</td>
                             <td>$order_date</td>
                             <td>$order_status</td>
                             <td>$qtv</td>
                           </tr> ";
                          }
                        }
                        else{
                          echo "<h2 class='text-center text-success'>Pending Order Is Not Currently Availible</h2>";
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
