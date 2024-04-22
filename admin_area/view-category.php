<?php
 include('../include/connection.php');
?>
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
        View Category
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
                    View Category
                </h2>
                
                <div class="container my-5">
                  <div class="row">
                  <form action="" method="post">
                  <table class="mx-2 table table-bordered text-center">  
                    <?php 
                         $selectcategory       = "select * from `categories`";
                         $selectcategoryoutput = mysqli_query($con,$selectcategory);
                         $countcategory        = mysqli_num_rows($selectcategoryoutput);
                         if($countcategory>0){
                            echo "
                            <tr>
                               <th>Id</th>
                               <th>Category Name</th>
                               <th>Edit Category</th>
                               <th>Delete Category</th>
                            </tr>
                            ";
                            while($fetchdata = mysqli_fetch_assoc($selectcategoryoutput)){
                                $cateid   = $fetchdata['categoryid'];
                                $catename = $fetchdata['categorytitle'];
                                ?>
                           <tr>
                             <td><?php echo $cateid; ?></td>
                             <td><?php echo $catename; ?></td>
                             <td ><?php echo "<a href='../admin_area/update-category.php?updatecategoryid=$cateid'><i class='fa-solid fa-pen-to-square text-black'></i></a>";?></td>
                             <td ><?php echo " <a href='../admin_area/delete-category.php?deletecategoryid=$cateid'><i class='fa-solid fa-trash text-black'></i></a>";?></td>
                          </tr>
                                <?php
                            }
                         }
                         else{
                            echo '<h2 class="text_success text-center">Not Found Any Type Of Category</h2>';
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
