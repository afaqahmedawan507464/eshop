<?php
  include('include/connection.php');
  include('common-funcation.php');
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
        Eshop Home Page
    </title>
</head>
<body>
    <!-- header section -->
    <header id="headersection" class="pb-2">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
           <a class="navbar-brand" href="#" class="mx-2"><img src="image/logo.png" alt=""></a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="products.php">Products</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="user_area/user-registration.php">Registration</a>
             </li>
             <!--  -->
           </ul>
            </div>
            </div>
       </nav>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="##" class="mx-2 px-3 text-decoration-none text-black border-end">Welcome As Guest</a>
            <a href="user_area/user-login.php" class=" px-2 text-decoration-none text-black">Login</a>
       </nav>
    </header>
    <!-- !header section -->


    <!-- main section -->
    <main id="mainsection">
        <div class="container-fluid py-3">
            <div class="container-fluid">
                <h2 class="text-center">
                    E-shop Store
                </h2>
                <p class="text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima aspernatur ab incidunt tempore, assumenda omnis praesentium porro eos iste placeat!
                </p>
                <div class="container">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">
                  <!-- <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operation</th>
                  </tr> -->
                  <tr>
                    <?php
                             $userippaddress         = getIPAddress();
                             $totalamount             = 0;
                             $selectcartdata         = "select * from `card_detailed` where ipaddress = '$userippaddress'";
                             $selectcartdataoutput   = mysqli_query($con,$selectcartdata);
                             if($selectcartdataoutput){
                              $itemsrow = mysqli_num_rows($selectcartdataoutput);
                               if($itemsrow>0){
                                echo "<tr>
                                     <th>Product Title</th>
                                     <th>Product Image</th>
                                     <th>Quantity</th>
                                     <th>Total Price</th>
                                     <th>Remove</th>
                                     <th>Operation</th>
                                   </tr>";
                               while($tabledatafetchrow = mysqli_fetch_array($selectcartdataoutput)){
                                 $carditemid = $tabledatafetchrow['carditemid']; 
                                 $productid = $tabledatafetchrow['productid'];
                                 $selectproductdata  = "select * from `products` where productid = $productid";
                                 $selectproductdataoutput   = mysqli_query($con,$selectproductdata);
                                 if($selectproductdataoutput){
                                   while($productdata = mysqli_fetch_array($selectproductdataoutput)){
                                     $productprice      = array($productdata['productprice']);
                                     $productpricevalue = array_sum($productprice);
                                     $totalamount += $productpricevalue;
                                     $productindivisualyprice = $productdata['productprice'];
                                     $productimage1 = $productdata['productimage1'];
                                     $producttitle  = $productdata['producttitle'];
                        ?>
                                     <td><?php echo $producttitle; ?></td>
                                     <td><img style = "width:100px;height:100px;" src="./admin_area/<?php echo $productimage1; ?>" alt=""></td>
                                     <td><input class="text-center" type="text" name="itemqtv">
                                     <?php
                                          
                                             $currentippaddress         = getIPAddress();
                                                if(isset($_POST['btn_update'])){ 
                                                   $quantities                = $_POST['itemqtv'];
                                                   $sqlupdatecardqtv          = "update `card_detailed` set qtv = $quantities where ipaddress = '$currentippaddress'";
                                                   $sqloutputcard = mysqli_query($con,$sqlupdatecardqtv);
                                                  if($sqloutputcard){
                                                    $totalamount = $totalamount * $quantities;
                                                  }
                                            }
                                     ?>
                                   
                                    </td>
                                     <td><?php echo $productindivisualyprice; ?></td>
                                     <td><input type="checkbox" name="removeid[]" value="<?php echo $productid ?>"></td>
                                     <td>
                                     <input type="submit" value="Update record" name="btn_update" class="btn bg-info text-white">
                                     <input type="submit" value="Delete record" name="btn_delete" class="btn bg-danger text-white">
                                     </td>
                                   </tr>
                                   <?php
                                   }
                                  }
                                }
                                 echo "
                                <div class='d-flex mb-5'> 
                                    <p>
                                          Total Amount : <strong class=' text-danger'>$totalamount/=</strong>
                                    </p>
                                          <button class='btn bg-secondary mx-2'><a class='text-white text-decoration-none' href='index.php'>Continue Shopping</a></button>
                                          <button class='btn bg-warning mx-2'><a class='text-white text-decoration-none' href='checkoutpage.php'>Checkoutcard</a></button>
                                 </div> ";
                              }else{
                                    echo '<h2 class="text-danger text-center">Your Card IS empty</h2>';
                                   echo " <button class='btn bg-secondary mx-2'><a class='text-white text-decoration-none' href='index.php'>Continue Shopping</a></button>";
                              }     
                              
                              }
                              
                              ?>
                                  <!-- -->
                              
                            </table>
                            </form>
                            <?php
                               function deletecarditems(){
                               global $con;
                                  if(isset($_POST['btn_delete'])){
                                     foreach($_POST['removeid'] as $selectdeleteitems){
                                      $delete = "delete from `card_detailed` where productid = $selectdeleteitems";
                                      $deleteoutput = mysqli_query($con,$delete);
                                      if($deleteoutput){
                                        echo '<script>alert("Delete Operation Sucessfully")</script>';
                                        echo '<script>window.open("card-detailed.php","_self")</script>';
                                      }
                                      else{
                                        echo '<script>alert("Delete Operation Failed")</script>';
                                        echo '<script>window.open("card-detailed.php","_self")</script>';
                                      }
                                     }
                                  }
                               }
                                echo $fun = deletecarditems();
                            ?>
                  </div>
                </div>              
            </div>
        </div>
                            </main>
    <!-- !main section -->


    <!-- footer section -->
    <?php
        include('./include/footer.php');
    ?>
    <!-- !footer section -->
</body>
</html>