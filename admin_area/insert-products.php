<?php
    include('../include/connection.php');
    if(isset($_POST['btn_productsinsert'])){
        // create some vaiarbles
        $producttitle       = $_POST['product_title'];
        $productdescription = $_POST['product_description'];
        $productskeyword    = $_POST['product_keyword'];
        // selector variable
        $productscategory   = $_POST['product_category'];
        $productsbrands     = $_POST['product_brands'];
        // image file variable
        //input variable
        $productprice       = $_POST['product_price'];
        // image 1
        $image1filename     = $_FILES['product_image1']['name'];
        $image1filetempname = $_FILES['product_image1']['tmp_name'];
        $foldername1        = "productsimages/".$image1filename;        

        // image 2
        $image2filename     = $_FILES['product_image2']['name'];
        $image2filetempname = $_FILES['product_image2']['tmp_name'];
        $foldername2        = "productsimages/".$image2filename;        

        // image 3
        $image3filename     = $_FILES['product_image3']['name'];
        $image3filetempname = $_FILES['product_image3']['tmp_name'];
        $foldername3        = "productsimages/".$image3filename;        
        //select all data into table
        $sqlselect          = "select * from `products`
        where 
        producttitle        = '$producttitle',
        productsdescription = '$productdescription',
        productskeyword     = '$productskeyword',
        productscategory    = '$productscategory',
        productsbrands      = '$productsbrands',
        productimage1       = '$foldername1',
        productimage2       = '$foldername2',
        productimage3       = '$foldername3',
        productprice        = '$productprice'";
        //store select output into variable
        $sqlselectoutput = mysqli_query($con,$sqlselect);
        //use row function
        $sqlnumrows = mysqli_num_rows($sqlselectoutput);
        //apply conditions
        if($sqlnumrows>0){
            echo '<script> alert("This Data is Al-ready availible in your database") </script>';
            die(mysqli_error($con));
        }
        else{
            if($producttitle == '' or $productdescription == '' or $productskeyword == '' or $productscategory == '' 
            or $productsbrands == '' or  $foldername1 == '' or $foldername2 == '' or $foldername3 == ''
            or $productprice == ''){
                echo '<script> alert("Field is empty. Must be filled all field") </script>';
                die(mysqli_error($con));
            }
            else{
                // image related work product image 1,image2,image3
                move_uploaded_file($image1filetempname,$foldername1);
                move_uploaded_file($image2filetempname,$foldername2);
                move_uploaded_file($image3filetempname,$foldername3);
                // sql insert statement
                $sqlinsert = "insert into `products` 
                (
                  producttitle        ,
                  productsdescription ,
                  productskeyword     ,
                  productscategory    ,
                  productsbrands      ,
                  productimage1       ,
                  productimage2       ,
                  productimage3       ,
                  productprice        
                )
                values
                (
                    '$producttitle',
                    '$productdescription',
                    '$productskeyword',
                    '$productscategory',
                    '$productsbrands',
                    '$foldername1',
                    '$foldername2',
                    '$foldername3',
                    '$productprice'
                )";
                //sql output
                $sqlinsertoutput    = mysqli_query($con,$sqlinsert);
                if($sqlinsertoutput){
                    echo '<script> alert("Inserting operation successfully") </script>';
                }
                else{
                    echo '<script> alert("Inserting operation failed please try again") </script>';
                    die(mysqli_error($con));
                }
            }
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
        Insert New Products
    </title>
</head>
<body>
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Insert New Products
            </h2>
           <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Title</label>
                <input type="text" class="form-control" name="product_title" placeholder="Enter Product Title">
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Description</label>
                <input type="text" class="form-control" name="product_description" placeholder="Enter Product Description">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Keyword</label>
                <input type="text" class="form-control" name="product_keyword" placeholder="Enter Product Keyword">
               </div>
               <div class="mb-3  w-50 m-auto">
                <select class="form-control" name="product_category" id="product_category">
                    <option value="Select a category">Select a category</option>
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
                    <option value="Select a brand">Select a brands</option>
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
                <input type="file" class="form-control" name="product_image1">
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Image 2</label>
                <input type="file" class="form-control" name="product_image2">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Image 3</label>
                <input type="file" class="form-control" name="product_image3">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="exampleInputEmail1" class="form-label">Products Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_productsinsert" class="btn btn-primary">Insert New Products</button>
               </div>
          </form>
        </div>
    </div>
</body>
</html>