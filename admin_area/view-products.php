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
        Product Details
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
                    All Products
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">  
                    <?php  
                       $selectproducts       = "select * from `products`";
                       $selectproductsoutput = mysqli_query($con,$selectproducts);
                       $findata              = mysqli_num_rows($selectproductsoutput);
                       if($findata>0){
                        echo '
                           <tr>
                             <th style="width:2%;">Id</th>
                             <th style="width:10%">Product Image</th>
                             <th style="width:15%">Product Title</th>
                             <th style="width:25%">Product Description</th>
                             <th style="width:10%">Category</th>
                             <th style="width:10%">Brand</th>
                             <th style="width:10%">Price</th>
                             <th style="width:10%">Sold</th>
                             <th style="width:10%">Edit</th>
                             <th style="width:10%">Delete</th>
                          </tr>
                          ';
                        while($prodfetch = mysqli_fetch_assoc($selectproductsoutput)){
                            $product_id           = $prodfetch['productid']; 
                            $product_image        = $prodfetch['productimage1'];
                            $product_title        = $prodfetch['producttitle'];
                            $product_description  = $prodfetch['productsdescription']; 
                            $productprice         = $prodfetch['productprice'];
                            $category_id          = $prodfetch['productscategory'];
                            $brand_id             = $prodfetch['productsbrands'];
                            ?>
                            <tr>
                             <td style="width:2%;"><?php echo $product_id;  ?></td>
                             <td style="width:10%;"><img src="<?php echo $product_image;  ?>" style="width:100px;height:70px;"></td>
                             <td style="width:15%"><?php echo $product_title;  ?></td>
                             <td style="width:25%"><?php echo $product_description;  ?></td>
                             <td style="width:10%"><?php 
                              $selectcategory       = "select * from `categories` where categoryid = $category_id";
                              $selectcategoryoutput = mysqli_query($con,$selectcategory);
                              $selectrow            = mysqli_num_rows($selectcategoryoutput);
                              if($selectrow>0){
                                $fetchcate          = mysqli_fetch_assoc($selectcategoryoutput);
                                $categoryname       = $fetchcate['categorytitle'];
                                echo $categoryname;
                              }
                             ?></td>
                             <td style="width:10%"><?php 
                              $selectbrands       = "select * from `brands` where brandsid = $brand_id";
                              $selectbrandsoutput = mysqli_query($con,$selectbrands);
                              $selectrow            = mysqli_num_rows($selectbrandsoutput);
                              if($selectrow>0){
                                $fetchbrand          = mysqli_fetch_assoc($selectbrandsoutput);
                                $brandsname       = $fetchbrand['brandname'];
                                echo $brandsname;
                              }
                              ?></td>
                             <td style="width:10%"><?php echo $productprice;  ?></td>
                             <td style="width:10%">Sold ( <?php 
                              $selectproductqtv       = "select * from `order_table` where product_id = $product_id";
                              $selectproductqtvoutput = mysqli_query($con,$selectproductqtv);
                              $selectrow            = mysqli_num_rows($selectproductqtvoutput);
                              if($selectrow>0){
                                $fetcproductqtv          = mysqli_fetch_assoc($selectproductqtvoutput);
                                $productqtv              = $fetcproductqtv['qtv'];
                                echo $productqtv;
                              }
                              else{
                                echo '0';
                              }
                             ?>
                             )</td>
                             <td style="width:10%"><?php echo " <a href='../admin_area/update-product.php?updateproductid=$product_id'><i class='fa-solid fa-pen-to-square text-black'></i></a>";?></td>
                             <td style="width:10%"><?php echo "<a href='../admin_area/delete-product.php?deleteproductid=$product_id'><i class='fa-solid fa-trash text-black'></i></a>"; ?></td>
                          </tr>
                            <?php
                        }
                       }
                       else{
                        echo '<h2 class="text-center text-success">Not Product Found</h2>';
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