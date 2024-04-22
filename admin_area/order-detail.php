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
        Order Details page
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
                    Customer Order Details
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">
                   <?php
                     $selectorder       = "select * from `order_table`";
                     $selectorderoutput = mysqli_query($con,$selectorder);
                     $orderscount       = mysqli_num_rows($selectorderoutput);
                     if($orderscount>0){
                        echo '
                        <tr>
                             <th>Order Id</th>
                             <th>Product Id</th>
                             <th>User Id</th>
                             <th>User Ip Address</th>
                             <th>Amount Due</th>
                             <th>Invoice Number</th>
                             <th>Total Products</th>
                             <th>Order Date</th>
                             <th>Order Status</th>
                             <th>Quantity</th>
                             <th>Delete</th>
                           </tr>
                        ';
                        while($fetchorder = mysqli_fetch_assoc($selectorderoutput)){
                            $orderid         = $fetchorder['order_id'];
                            $productid       = $fetchorder['product_id'];
                            $userid          = $fetchorder['user_id'];
                            $useripaddress   = $fetchorder['user_ipaddress'];
                            $amountremaining = $fetchorder['due_amount'];
                            $invoicenumber   = $fetchorder['invoice_number'];
                            $totalproducts   = $fetchorder['total_products'];
                            $orderdate       = $fetchorder['order_date'];
                            $orderstatus     = $fetchorder['order_status'];
                            $quantity        = $fetchorder['qtv']; ?>
                            <tr>
                             <td><?php echo $orderid; ?></td>
                             <td><?php echo $productid; ?></td>
                             <td><?php echo $userid; ?></td>
                             <td><?php echo $useripaddress; ?></td>
                             <td><?php echo $amountremaining; ?></td>
                             <td><?php echo $invoicenumber; ?></td>
                             <td><?php echo $totalproducts; ?></td>
                             <td><?php echo $orderdate; ?></td>
                             <td><?php echo $orderstatus; ?></td>
                             <td><?php echo $quantity; ?></td>
                             <td><?php echo " <a href='../admin_area/delete-orders.php?deleteorderid=$orderid'><i class='fa-solid fa-trash text-black'></i></a>"; ?></td>
                            </tr>
                            <?php
                        }
                     }
                     else{
                        echo '<h2 class="text-center text-success">No Order Founded</h2>';
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