<?php
  include('include/connection.php');
  include('common-funcation.php');
  session_start();
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
        Products Page
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
             <li class="nav-item">
               <a class="nav-link" aria-current="page" href="/eshopp/card-detailed.php"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php carditemscounts(); ?></sup></span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">Total Price:<?php carditemsprice(); ?>/-</a>
             </li>
           </ul>
           <form class="d-flex" method="get" enctype="multipart/form-data" action="search-data.php">
             <input class="form-control me-2" type="search" placeholder="Search" name="searchbox" aria-label="Search">
             <input class="btn btn-outline-success" type="submit" value="search" name="btn_search"></input>
           </form>
            </div>
            </div>
       </nav>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <ul>
       <?php
       //session_start();
          if(!isset($_SESSION['username'])){
            echo "<a href='##' class='mx-2 px-3 text-decoration-none text-black border-end'>Welcome Mr Guest</a>";
            }else{
              echo '<a href="##" class="mx-2 px-3 text-decoration-none text-black border-end">Welcome Mr '.$_SESSION['username'].'</a>';
          }
          if(!isset($_SESSION['username'])){
            
           
            echo " <a href='/eshopp/user_area/user-login.php' class=' px-2 text-decoration-none text-black'>Login</a>";
            }
            else {
             echo " <a href='/eshopp/logout.php' class=' px-2 text-decoration-none text-black'>Logout</a> "; 
          }
        ?>
       </ul>
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
                <div class="row">
                    <div class="col-xl-10 col-lg-12 border-1">
                        <!-- product card part -->
                        <div class="row p-2">
                          <?php 
                              productsalldata();
                              fetchfunction();
                              card();
                          ?>  
                          <!--  -->
                        </div>
                        <!--  -->
                        <!--  -->
                        <!-- ! product card part  -->
                    </div>
                    <div class="col-xl-2 col-lg-12 border-1 bg-light">
                        <!-- category -->
                        <div class="row py-3 bg-secondary text-white text-center">
                            <h4>
                              Deleivery Brands
                            </h4>
                        </div>
                        <nav>
                            <ul>
                              <?php
                                  brands();
                              ?>
                            </ul>
                        </nav>
                    <!--  -->
                    <div class="row py-3 bg-secondary text-white text-center">
                            <h4>
                              Category
                            </h4>
                        </div>
                        <nav>
                            <ul>
                            <?php
                              categories();     
                            ?>
                            </ul>
                        </nav>
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