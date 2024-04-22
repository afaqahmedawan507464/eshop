<?php
  include('../include/connection.php');
  session_start();
  if(isset($_GET['orderid'])){
    $order_id = $_GET['orderid'];
    $selectinvoice        = "select * from `order_table` where order_id = $order_id";
    $selectinvoiceoutput  = mysqli_query($con,$selectinvoice);
    $selectrow            = mysqli_num_rows($selectinvoiceoutput);
    if($selectrow>0){
        $fetchorder       = mysqli_fetch_assoc($selectinvoiceoutput);
        $invoice_number   = $fetchorder['invoice_number'];
        $total_amount     = $fetchorder['due_amount']; 
        $useripaddress    = $fetchorder['user_ipaddress'];
    }
  }



  if(isset($_POST['btn_confirmpayment'])){
    $invoicenumber       = $_POST['invoicenumber']; 
    $totalamount         = $_POST['totalamount'];
    $paymentoptions      = $_POST['paymentmethod'];

    $selectdata          = "select * from `payment_details` where order_id = $order_id";
    $selectoutputdata    = mysqli_query($con,$selectdata);
    $selectpayemntrow    = mysqli_num_rows($selectoutputdata);
    if($selectpayemntrow>0){
        echo '<script>alert("This Order is al-ready pay")</script>';
        header('location:../user_area/confirm-payment.php');
        die(mysqli_error($con));
    }
    else{
        $insertdata           = "insert into `payment_details`
        (order_id,invoice_number,total_amount,payment_option,user_ipaddress,payment_date) values ($order_id,$invoicenumber,$totalamount,'$paymentoptions','$useripaddress',NOW())";
        $insertdataoutput     = mysqli_query($con,$insertdata);
        if($insertdataoutput){
            if($paymentoptions == ''){
                echo '<script>alert("Payment Method is not selected")</script>';
                header('location:../user_area/confirm-payment.php');
                die(mysqli_error($con));
            }
            else{
              echo '<script>alert("Payement Completed")</script>';
              header('location:../user_area/user-profile.php?orderdetailes');
            }
        }
        else{
            echo '<script>alert("Payement In-Completed")</script>';
            header('location:../user_area/user-profile.php?orderdetailes');
            die(mysqli_error($con));
        }
    }

  }

  //update order table

    $update                 = "update `order_table` set order_status = 'paid' where invoice_number = $invoice_number";
    $updateoutput           = mysqli_query($con,$update);
    // delete
    $delete                 = "delete from `order_pending` where invoice_number = $invoice_number"; 
    $deleteoutput           = mysqli_query($con,$delete);
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
        Confirm Payment Offline
    </title>
</head>
<body>
    <!-- header section -->
   
    <!-- !header section -->


    <!-- main section -->
    <main id="mainsection">
        <div class="container-fluid py-3 my-5">
            <div class="container-fluid">
                <h2 class="text-center">
                    Confirm Payments
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post" class="w-50 m-auto">
                  <div class="mb-3 w-50 m-auto">
                    <input type="text" class="form-control text-center" name="invoicenumber" value="<?php echo $invoice_number; ?>">
                  </div>
                  <div class="mb-3 w-50 m-auto">
                    <p class="text-center">Total Amount</p>
                    <input type="text" class="form-control text-center" name="totalamount" value="<?php echo $total_amount; ?>">
                  </div>
                  <div class="my-3 w-50 m-auto">
                    <select class="form-control text-center" name="paymentmethod">
                        <option value="">Select payment method</option>
                        <option value="cash on deleivery">Cash On Deleivery</option>
                        <option value="pay with check">Pay with check</option>
                        <option value="jazzcash">Jazzcash</option>
                        <option value="easypaisa">Easypaisa</option>
                        <option value="upaisa">Upaisa</option>
                    </select>
                  </div>
                  <div class="mb-3  w-50 m-auto">
                    <button type="submit" name="btn_confirmpayment" class="btn btn-primary">Pay Now</button>
                  </div>
                  </form>
                  
                </div>
            </div>
        </div>
    </main>
</body>
</html>