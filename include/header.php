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
            <a href="##" class="mx-2 px-3 text-decoration-none text-black border-end">Welcome As Guest</a>
            <a href="/eshopp/user_area/user-login.php" class=" px-2 text-decoration-none text-black">Login</a>
       </nav>
    </header>