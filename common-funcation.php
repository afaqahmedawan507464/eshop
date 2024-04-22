<?php
      include('include/connection.php');
    //products data
    function products(){
        global $con;
        if(!isset($_GET['categoryid'])){
            if(!isset($_GET['brandid'])){
              $sqlselect  = "select * from `products` order by rand() LIMIT 0,20";
              $sqlselectoutput = mysqli_query($con,$sqlselect);
              $sqloutputrow = mysqli_num_rows($sqlselectoutput);
              if($sqloutputrow>0){
                 while($productfetchdata = mysqli_fetch_assoc($sqlselectoutput)){ 
                   $productid            = $productfetchdata['productid'];
                   $producttitle         = $productfetchdata['producttitle']; 
                   $productdescription   = $productfetchdata['productsdescription'];
                   $productkeyword       = $productfetchdata['productskeyword'];
                   $productcategory      = $productfetchdata['productscategory'];
                   $productbrands        = $productfetchdata['productsbrands'];
                   $productimage1        = $productfetchdata['productimage1'];
                   $productprice         = $productfetchdata['productprice'];
                   echo "
                   <div class='col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2'>
                   <div class='card'>
                      <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                     <h5 class='card-title'>$producttitle</h5>
                     <p class='card-text'>$productdescription</p>
                     <p class='card-text'>Rs:$productprice/=</p>
                     </div>
                     <div class='card-body'>
                       <button class='btn bg-warning'><a href='index.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                       <button class='btn bg-secondary'><a href='products-detailed.php?productsid=$productid' class='card-link text-decoration-none text-white'>View More</a></button>
                      </div>
                      </div>
                      </div> 
                    ";
                   }
                }
                else{
                   echo '<h2 class="text-center text-danger">Not data found</h2>';
                }
            }
        }
   }
    //products detailed data
    function productdetailed(){
        global $con;
        if(isset($_GET['productsid'])){
          $productdetailedid = $_GET['productsid'];
              if(!isset($_GET['categoryid'])){
                if(!isset($_GET['brandid'])){
                  $sqlselect  = "select * from `products` where productid = $productdetailedid";
                  $sqlselectoutput = mysqli_query($con,$sqlselect);
                  
                  if($sqlselectoutput){
                      $sqloutputrow = mysqli_num_rows($sqlselectoutput);
                     if($sqloutputrow>0){
                        while($productfetchdata = mysqli_fetch_assoc($sqlselectoutput)){ 
                          $productid            = $productfetchdata['productid'];
                          $producttitle         = $productfetchdata['producttitle']; 
                          $productdescription   = $productfetchdata['productsdescription'];
                          $productkeyword       = $productfetchdata['productskeyword'];
                          $productcategory      = $productfetchdata['productscategory'];
                       $productbrands        = $productfetchdata['productsbrands'];
                       $productimage1        = $productfetchdata['productimage1'];
                       $productimage2        = $productfetchdata['productimage2'];
                       $productimage3        = $productfetchdata['productimage3'];
                       $productprice         = $productfetchdata['productprice'];
                       echo "
                       <div class='col-md-3'>
                          <!-- card data -->
                          <div class='card'>
                             <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                               <h5 class='card-title'>$producttitle</h5>
                               <p class='card-text'>$productdescription</p>
                               <p class='card-text'>Rs:$productprice/=</p>
                             </div>
                             <div class='card-body'>
                               <button class='btn bg-warning'><a href='products.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                               <button class='btn bg-secondary'><a href='products.php' class='card-link text-decoration-none text-white'>Product Page</a></button>
                             </div>
                          </div>
                        </div>
                        <!----->
                        <div class='col-md-9'>
                        <!-- card data related images -->
                        <div class='col-md-5'>
                        <!-- card data related image 1 -->
                        <img class='w-100 h-100' src='./admin_area/$productimage2' class='card-img-top' alt='...'>
                        </div>
                        <div class='col-md-5'>
                        <!-- card data related image 2 -->
                        <img class='w-100 h-100'  src='./admin_area/$productimage3' class='card-img-top' alt='...'>
                        </div>
                        </div> 
                        ";
                       }
                      }
                      
                    }
                }
            }
          }
          else{
            echo '<script> alert("Not Data found in database!") </script>';
           die(mysqli_error($con));
          }
    }
    //search products data
    function searchproducts(){
        global $con;
        if(isset($_GET['btn_search'])){
              $searchkeyword = $_GET['searchbox'];
              if($searchkeyword == ''){
                echo '<script>alert("Type first data in search box")</script>';
                header('location:inex.php');
                exit();
              }
              else{
              //echo $searchkeyword;
              $sqlselect  = "select * from `products` where productskeyword like '%$searchkeyword%'";
              $sqlsearchoutput = mysqli_query($con,$sqlselect);
              if($sqlsearchoutput){
                 $sqlrow = mysqli_num_rows($sqlsearchoutput);
                 if($sqlrow==0){
                    echo '<h1 class="text-center text-danger">Not Data Found In This Keywords.<h1>';
                 }
                 else{
                      while($productfetchdata = mysqli_fetch_assoc($sqlsearchoutput)){ 
                      $productid           = $productfetchdata['productid'];
                      $producttitle        = $productfetchdata['producttitle']; 
                      $productdescription  = $productfetchdata['productsdescription'];
                //    $productkeyword      = $productfetchdata['productskeyword'];
                //    $productcategory     = $productfetchdata['productscategory'];
                //    $productbrands       = $productfetchdata['productsbrands'];
                      $productimage1       = $productfetchdata['productimage1'];
                      $productprice        = $productfetchdata['productprice'];
                      echo "
                      <div class='col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2'>
                        <div class='card'>
                           <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                          <h5 class='card-title'>$producttitle</h5>
                          <p class='card-text'>$productdescription</p>
                          <p class='card-text'>Rs:$productprice/=</p>
                        </div>
                        <div class='card-body'>
                           <button class='btn bg-warning'><a href='index.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                           <button class='btn bg-secondary'><a href='product-detailed.php?productid=$productid' class='card-link text-decoration-none text-white'>View More</a></button>
                        </div>
                      </div>
                      </div> 
                       ";
                       }
                    }
                }
                else{
                   echo '<script> alert("Not Data found in database!") </script>';
                  die(mysqli_error($con));
                }
            }
        }
   }
   //products ALL data
   function productsalldata(){
    global $con;
    if(!isset($_GET['categoryid'])){
        if(!isset($_GET['brandid'])){
          $sqlselect  = "select * from `products` order by rand()";
          $sqlselectoutput = mysqli_query($con,$sqlselect);
          if($sqlselectoutput){
             while($productfetchdata = mysqli_fetch_assoc($sqlselectoutput)){ 
               $productid           = $productfetchdata['productid'];
               $producttitle        = $productfetchdata['producttitle']; 
               $productdescription  = $productfetchdata['productsdescription'];
               $productkeyword      = $productfetchdata['productskeyword'];
               $productcategory     = $productfetchdata['productscategory'];
               $productbrands       = $productfetchdata['productsbrands'];
               $productimage1       = $productfetchdata['productimage1'];
               $productprice        = $productfetchdata['productprice'];
               echo "
               <div class='col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2'>
               <div class='card'>
                  <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                 <h5 class='card-title'>$producttitle</h5>
                 <p class='card-text'>$productdescription</p>
                 <p class='card-text'>Rs:$productprice/=</p>
                 </div>
                 <div class='card-body'>
                   <button class='btn bg-warning'><a href='products.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                    <button class='btn bg-secondary'><a href='products-detailed.php?productid=$productid' class='card-link text-decoration-none text-white'>View More</a></button>
                  </div>
                  </div>
                  </div> 
                ";
               }
            }
            else{
               echo '<script> alert("Not Data found in database!") </script>';
              die(mysqli_error($con));
            }
        }
    }
   }
    //get new products 
    function fetchfunction(){
        global $con;
        // fetch data by search categoryid
        if(isset($_GET['categoryid'])){
            $categoryid = $_GET['categoryid'];
            $sqlselect  = "select * from `products` where productscategory = $categoryid";
            $sqlselectoutput = mysqli_query($con,$sqlselect);
            if($sqlselectoutput){
                $sqloutputinnumber = mysqli_num_rows($sqlselectoutput);
                if($sqloutputinnumber==0){
                    echo '<h1 class="text-center text-danger">Not Data Found Related In This Category Try Other Category ! !</h1>';
                }
                else{
                   while($productfetchdata = mysqli_fetch_assoc($sqlselectoutput)){ 
                        $productid           = $productfetchdata['productid'];
                        $producttitle        = $productfetchdata['producttitle']; 
                        $productdescription  = $productfetchdata['productsdescription'];
                        $productkeyword      = $productfetchdata['productskeyword'];
                        $productcategory     = $productfetchdata['productscategory'];
                        $productbrands       = $productfetchdata['productsbrands'];
                        $productimage1       = $productfetchdata['productimage1'];
                        $productprice        = $productfetchdata['productprice'];
                        echo "
                        <div class='col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2'>
                          <div class='card'>
                            <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title'>$producttitle</h5>
                              <p class='card-text'>$productdescription</p>
                              <p class='card-text'>Rs:$productprice/=</p>
                            </div>
                            <div class='card-body'>
                              <button class='btn bg-warning'><a href='index.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                              <button class='btn bg-secondary'><a href='products-detailed.php?productid=$productid' class='card-link text-decoration-none text-white'>View More</a></button>
                            </div>
                          </div>
                        </div> 
                        ";
                   }
                }
            }
            else{
                echo '<script> alert("Not Data found in database!") </script>';
                die(mysqli_error($con));
            }
        }

        // fetch data by search brandid
        if(isset($_GET['brandid'])){
            $brandid = $_GET['brandid'];
            $sqlselect  = "select * from `products` where productsbrands = $brandid";
            $sqlselectoutput = mysqli_query($con,$sqlselect);
            if($sqlselectoutput){
                $sqloutputinnumber = mysqli_num_rows($sqlselectoutput);
                if($sqloutputinnumber==0){
                    echo '<h1 class="text-center text-danger">Not Data Found Related In This Brands Try Other Brands ! !</h1>';
                }
                else{
                   while($productfetchdata = mysqli_fetch_assoc($sqlselectoutput)){ 
                        $productid           = $productfetchdata['productid'];
                        $producttitle        = $productfetchdata['producttitle']; 
                        $productdescription  = $productfetchdata['productsdescription'];
                        $productkeyword      = $productfetchdata['productskeyword'];
                        $productcategory     = $productfetchdata['productscategory'];
                        $productbrands       = $productfetchdata['productsbrands'];
                        $productimage1       = $productfetchdata['productimage1'];
                        $productprice        = $productfetchdata['productprice'];
                        echo "
                        <div class='col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2'>
                          <div class='card'>
                            <img src='./admin_area/$productimage1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                              <h5 class='card-title'>$producttitle</h5>
                              <p class='card-text'>$productdescription</p>
                              <p class='card-text'>Rs:$productprice/=</p>
                            </div>
                            <div class='card-body'>
                              <button class='btn bg-warning'><a href='index.php?productid=$productid' class='card-link text-decoration-none text-white'>Add Card</a></button>
                              <button class='btn bg-secondary'><a href='products-detailed.php?productid=$productid' class='card-link text-decoration-none text-white'>View More</a></button>
                            </div>
                          </div>
                        </div> 
                        ";
                   }
                }
            }
            else{
                echo '<script> alert("Not Data found in database!") </script>';
                die(mysqli_error($con));
            }
        }
    } 
    //get ip address   
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
       //whether ip is from the remote address  
        else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // cart functions
    function card(){
      global $con;
      if(isset($_GET['productid'])){
        $fetchuseridaddress = getIPAddress();
        $productid = $_GET['productid'];
        $sqlselect  = "select * from `card_detailed` where productid = $productid && ipaddress = '$fetchuseridaddress'";
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        if($sqlselectoutput){
          $sqldatacountfunction = mysqli_num_rows($sqlselectoutput);
          if($sqldatacountfunction>0){
            echo '<script>alert("This Product Al-Ready Avil In Your Card")</script>';
            echo '<script>window.open("index.php")</script>';
          }
          else{
            $sqlinsert = "insert into `card_detailed` (productid,ipaddress,qtv) values($productid,'$fetchuseridaddress',0)";
            $sqlinsertoutput = mysqli_query($con,$sqlinsert);
            if($sqlinsertoutput){
              echo '<script>alert("This Product Added In yOur Card")</script>';
              echo '<script>window.open("index.php")</script>';
            } 
            else{
              echo '<script>alert("Sorry ! This Product Not Added In yOur Card")</script>';
              echo '<script>window.open("index.php")</script>';
            }
          }
        }
      }
    }  
    // card item count funcation
    function carditemscounts(){
      global $con;
      if(isset($_GET['productid'])){
        $useripaddress = getIPAddress();
        $sqlselect = "select * from `card_detailed` where ipaddress = '$useripaddress'";
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        if($sqlselectoutput){
          $sqlitemcount = mysqli_num_rows($sqlselectoutput);
          if($sqlitemcount){
              echo $sqlitemcount;
              echo '<script>window.open("index.php")</script>';
           }
           
        }
      }
      else{
        $useripaddress = getIPAddress();
        $sqlselect = "select * from `card_detailed` where ipaddress = '$useripaddress'";
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        if($sqlselectoutput){
          $sqlitemcount = mysqli_num_rows($sqlselectoutput);
          if($sqlitemcount){
              echo $sqlitemcount;
              echo '<script>window.open("index.php")</script>';
           }
           
        }
      }
    }
    // card item price adding funcation
    function carditemsprice(){
      global $con;

      $totalprice    = 0;
      $useripaddress = getIPAddress();

      $sqlselectcard      = "select * from `card_detailed` where ipaddress = '$useripaddress'";
      $sqlselectcardouput = mysqli_query($con,$sqlselectcard);
      if($sqlselectcardouput){
        while($row = mysqli_fetch_array($sqlselectcardouput)){
          $productid = $row['productid'];

          $sqlselectproduct      = "select * from `products` where productid = $productid";
          $sqlselectproductouput = mysqli_query($con,$sqlselectproduct);
          if($sqlselectproductouput){

            while($rowproduct = mysqli_fetch_array($sqlselectproductouput)){
              $productprice      = array($rowproduct['productprice']);
              $productpricevalue = array_sum($productprice);
              $totalprice += $productpricevalue;
            }
          }
          else{
            echo '<script>alert("Not Product Show")</script>';
            echo '<script>window.open("index.php")</script>';
          }
        }
        echo $totalprice;
      }
    }
    // delete card function
    //brandssss
    function brands(){
        global $con;
        $sqlselect        = "select * from `brands`";
        $sqlselectoutput  = mysqli_query($con,$sqlselect);
        if($sqlselectoutput){
            $brandfetchdata   = mysqli_fetch_assoc($sqlselectoutput);
            while($brandfetchdata = mysqli_fetch_assoc($sqlselectoutput)){
                $fetchbrandname = $brandfetchdata['brandname'];
                $fetcbrandsid = $brandfetchdata['brandsid'];
                echo "<li class='py-2' style='list-style: none;'><a class='text-decoration-none text-black' href='index.php?brandid=$fetcbrandsid'>$fetchbrandname</a></li>";
            }
        }
        else{
            echo '<script> alert("Not Data found in database!") </script>';
            die(mysqli_error($con));
        }
    }
    //categories
    function categories(){
        global $con;
        $sqlselect       = "select * from `categories`";
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        if($sqlselectoutput){
        $categoryfetchdata = mysqli_fetch_assoc($sqlselectoutput);
            while($categoryfetchdata = mysqli_fetch_assoc($sqlselectoutput)){
                $fetchcategoryname = $categoryfetchdata['categorytitle'];
                $fetchcategoryid = $categoryfetchdata['categoryid'];
            echo "<li class='py-2' style='list-style: none;'><a class='text-decoration-none text-black' href='index.php?categoryid=$fetchcategoryid'>$fetchcategoryname</a></li>";
            }
        }
        else{
        echo '<script> alert("Not Data found in database!") </script>';
        die(mysqli_error($con));
        }
    }
?>