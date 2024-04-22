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
        Registration Form
    </title>
</head>
<body>

    <!-- main section -->
    <main id="mainsection">
    <div class="container-fluid">
        <div class="container py-5">
            <h2 class="text-center">
                Update Admin
            </h2>
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
            <form method="post" class="py-3" enctype="multipart/form-data" action="#">
              <div class="mb-3 w-50 m-auto">
                <label for="UserImage" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image">
               </div>
              <div class="mb-3 w-50 m-auto">
                <label for="Username" class="form-label">User name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter Username">
               </div>
               <div class="mb-3 w-50 m-auto">
                <label for="Emailaddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" name="email_address" placeholder="Enter Emailaddress">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                <label for="Conform Password" class="form-label">Conform Password</label>
                <input type="password" class="form-control" name="conform_password" placeholder="********">
               </div>
               <div class="mb-3  w-50 m-auto">
                 <button type="submit" name="btn_update" class="btn btn-primary">Update User</button>
               </div>
          </form>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <!-- !footer section -->
</body>
</html>