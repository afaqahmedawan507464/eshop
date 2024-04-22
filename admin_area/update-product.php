<?php
 include('../include/connection.php');
 if(isset($_GET['updateproductid'])){
    $updateproductid       = $_GET['updateproductid'];
    $selectprerecord       = "select * from `products` where productid = $updateproductid";
    $selectprerecordoutput = mysqli_query($con,$selectprerecord);
    $prerecordcount        = mysqli_num_rows($selectprerecordoutput);
    if($prerecordcount>0){
        while($fetcholddate = mysqli_fetch_assoc($selectprerecordoutput)){
            $old_product_title         = $fetcholddate['producttitle'];
            $old_product_description   = $fetcholddate['productsdescription'];
            $old_product_keyword       = $fetcholddate['productskeyword'];
            $old_category              = $fetcholddate['productscategory'];
            $old_brands                = $fetcholddate['productsbrands'];
            $old_product_image1        = $fetcholddate['productimage1'];
            $old_product_image2        = $fetcholddate['productimage2'];
            $old_product_image3        = $fetcholddate['productimage3'];
            $old_product_price         = $fetcholddate['productprice'];
        }
    }
    else{
        echo '<script>alert("Not Data Found")</script>';
        header('location:../admin_area/admin-dashboard.php?view_product');
    }
 }
 if(isset($_POST['btn_productsupdate'])){
    $update_product_title         = $_POST['product_title'];
    $update_product_description   = $_POST['product_description'];
    $update_product_keyword       = $_POST['product_keyword'];
    $update_category              = $_POST['product_category'];
    $update_brands                = $_POST['product_brands'];

    $updateimagename1              = $_FILES["product_image1"]["name"];
    $updateimagetmpname1              = $_FILES["product_image1"]["tmp_name"];
    $updateimagefolder1            = "productsimages/".$updateimagename1;

    $updateimagename2              = $_FILES["product_image2"]["name"];
    $updateimagetmpname2              = $_FILES["product_image2"]["tmp_name"];
    $updateimagefolder2            = "productsimages/".$updateimagename2;

    $updateimagename3              = $_FILES["product_image3"]["name"];
    $updateimagetmpname3              = $_FILES["product_image3"]["tmp_name"];  
    $updateimagefolder3            = "productsimages/".$updateimagename3;

    $update_product_price         = $_POST['product_price'];
    $selectupdate       = "select * from `products` where productid = $updateproductid";
    $selectupdateoutput = mysqli_query($con,$selectupdate);
    $recordrow          = mysqli_num_rows($selectupdateoutput);
    if($recordrow>0){
        if($update_product_title == '' or $update_product_description == '' or $update_product_keyword == '' or $update_category == '' or $update_brands == '' or $updateimagefolder1 == '' or $updateimagefolder2 == '' or $updateimagefolder3 =='' or $update_product_price == ''){
            echo '<script>alert("All field is required")</script>';
            die(mysqli_error($con));
        }
        else{
        move_uploaded_file($updateimagetmpname1,"$updateimagefolder1");
        move_uploaded_file($updateimagetmpname2,"$updateimagefolder2");
        move_uploaded_file($updateimagetmpname3,"$updateimagefolder3");

        $update = "update `products` set 
        producttitle        = '$update_product_title',
        productsdescription = '$update_product_description',
        productskeyword     = '$update_product_keyword',
        productscategory    = '$update_category',
        productsbrands      = '$update_brands',
        productimage1       = '$updateimagefolder1',
        productimage2       = '$updateimagefolder2',
        productimage3       = '$updateimagefolder3',
        productprice        = $update_product_price,
        time                = NOW()
        where productid = $updateproductid";
        $updateoutput       = mysqli_query($con,$update);
        if($updateoutput){
            echo '<script>alert("This data updated")</script>';
            header('location:../admin_area/admin-dashboard.php?view_product');
        } 
        else{
            echo '<script>alert("this data not updated")</script>';
            header('location:../admin_area/admin-dashboard.php?view_product');
        }
      }
    }
    else{
        echo '<script>alert("Not Data found")</script>';
        header('location:../admin_area/admin-dashboard.php?view_product');
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
        Update Products
    </title>
</head>
<body>
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Update Products
            </h2>
           <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Title</label>
                <input type="text" class="form-control" name="product_title" placeholder="Enter Product Title" value=<?php echo $old_product_title;?>>
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Description</label>
                <input type="text" class="form-control" name="product_description" placeholder="Enter Product Description"  value=<?php echo $old_product_description;?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Keyword</label>
                <input type="text" class="form-control" name="product_keyword" placeholder="Enter Product Keyword"  value=<?php echo $old_product_keyword;?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                <select class="form-control" name="product_category" id="product_category">
                <?php 
                            $prebrandsselect       = "select * from `brands` where categoryid = $old_category";
                            $prebrandsselectoutput = mysqli_query($con,$prebrandsselect);
                            if($prebrandsselectoutput){
                               $preoutput = mysqli_fetch_assoc($prebrandsselectoutput);
                                    $oldbrandid   = $preoutput['categoryid'];
                                    $oldbrandname = $preoutput['categorytitle'];
                                echo "<option value='$oldbrandid'>$oldbrandname</option>";
                            }
                       ?>
                    <?php
                        $sqlcatselect       = "select * from `categories`";
                        $sqlcatselectoutput = mysqli_query($con,$sqlcatselect);
                        if($sqlcatselectoutput){
                           while ($fetch_categorydata = mysqli_fetch_assoc($sqlcatselectoutput)){
                            $outputcategoryid   = $fetch_categorydata['categoryid'];
                            $outputcategoryname = $fetch_categorydata['categorytitle'];
                            echo "<option value=$outputcategoryid>$outputcategoryname</option>";
                           }
                        }
                        else{
                            echo '<script> alert("Your Selector Value Is Empty!") </script>';
                            die(mysqli_error($con));
                        }
                    ?>
                </select>
               </div>
               <div class="mb-3  w-50 m-auto">
                <select class="form-control" name="product_brands" id="product_brands">
                <?php 
                            $prebrandsselect       = "select * from `brands` where brandsid = $old_brands";
                            $prebrandsselectoutput = mysqli_query($con,$prebrandsselect);
                            if($prebrandsselectoutput){
                               $preoutput = mysqli_fetch_assoc($prebrandsselectoutput);
                                    $oldbrandid   = $preoutput['brandsid'];
                                    $oldbrandname = $preoutput['brandname'];
                                echo "<option value='$oldbrandid'>$oldbrandname</option>";
                            }
                       ?>
                    <?php
                        $sqlbrandsselect       = "select * from `brands`";
                        $sqlbrandsselectoutput = mysqli_query($con,$sqlbrandsselect);
                        if($sqlbrandsselectoutput){
                           while ($fetch_branddata = mysqli_fetch_assoc($sqlbrandsselectoutput)){
                            $outputbrandid   = $fetch_branddata['brandsid'];
                            $outputbrandname = $fetch_branddata['brandname'];
                            echo "<option value=$outputbrandid>$outputbrandname</option>";
                           }
                        }
                        else{
                            echo '<script> alert("Your Selector Value Is Empty!") </script>';
                            die(mysqli_error($con));
                        }
                    ?>
                </select>
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Image 1</label>
                <input type="file" class="form-control my-2" name="product_image1">
                <img src="<?php echo $old_product_image1;?>" alt="">
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Image 2</label>
                <input type="file" class="form-control my-2" name="product_image2">
                <img src="<?php echo $old_product_image2;?>" alt="">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Image 3</label>
                <input type="file" class="form-control my-2" name="product_image3">
                <img src="<?php echo $old_product_image3;?>" alt="">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price"  value=<?php echo $old_product_price;?>>
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_productsupdate" class="btn btn-primary">Update Products</button>
               </div>
          </form>
        </div>
    </div>
</body>
</html>