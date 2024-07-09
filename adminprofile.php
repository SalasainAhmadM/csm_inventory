<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Profile - CSM Inventory System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/csmlogo.png" rel="icon">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Evogria">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary" style="font-family: 'Evogria', sans-serif; color: #FFA500;
                    "><img src="img/csmlogo.png" alt="" style="width: 40px; height: 40px; margin-right: 10px;">CSM</h3>
                </a>
            
                <div class="navbar-nav w-100">
                    <a style="font-family: 'Evogria', sans-serif;"href="apparatus.php" class="nav-item nav-link"><i class="fas fa-bong"></i>Apparatus</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="chemicals.php" class="nav-item nav-link"><i class="fas fa-wine-bottle"></i>Chemicals</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="ctrlchem.php" class="nav-item nav-link"><i class="fas fa-vials"></i>Controlled Chem</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="equipment.php" class="nav-item nav-link"><i class="fas fa-cog"></i>Equipment</a>
                  <!--  <a style="font-family: 'Evogria', sans-serif;" href="borrowing.php" class="nav-item nav-link"><i class="fas fa-hands"></i>Borrowing</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="breakage.php" class="nav-item nav-link"><i class="fas fa-heart-broken"></i>Breakage</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="clearance.php" class="nav-item nav-link"><i class="fas fa-book-open"></i>Clearance</a>-->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav style="box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);" 
            class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="img/csmlogo.png" alt="" style="width: 40px; height: 40px; margin-right: 10px;"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <img src="img/sidebar.png" alt="" style="width: 40px; height: 40px;">
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Critical Stock on Tube 8</h6>
                                <small>15 minutes ago</small>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/login-background.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $username;?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a style="font-family: 'Evogria', sans-serif;" href="adminprofile.php" class="dropdown-item"><i class="fas fa-user" style="margin: 10px;">
                            </i>Admin</a>
                            <a style="font-family: 'Evogria', sans-serif;" href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt" style="margin: 10px;">
                            </i>Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Widgets Start -->
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div style="background-color: lightgray;"class="card mt-3 shadow">
                        <div class="card-body">
                        <h5 class="mb-5"style="font-weight: bolder; font-family: 'Evogria', sans-serif; ">Admin Profile</h5>
                      
                            <div class="row">
                              
                                <div class="col-md-8">
            
                            <h6 style="font-size:14px">
                           
                   Username
                    <input type="text" class="form-control mb-3" style="font-size:13px;color: black;"<?php echo $username;?> name="name" required>
            
                   Email
                    <input type="text" class="form-control mb-3" style="font-size:13px;" name="email">
            
                   Password
                   <input type="password" class="form-control mb-3" style="font-size:13px" name="password">
                            </h6>
            
                                </div>
                                <div class="col-md-3">
            
                                <h6 style="text-align:center" class="mb-5">
                                <img src="img/addimage.jpg" alt="" class="img-thumbnail form-control" >
                                <br>
                                <input type="file" name="photo" style="font-size:13px" accept="image/*" class="form-control">
                                </h6>
            
            
            
            
                                </div>
                            </div>
                           
                          <div class="btn-group" style="float:right; ">
                         <button type="submit" name="adminprofile" class="btn btn-secondary" style="font-size:14px; font-family: 'Evogria', sans-serif;">Update</button>
                         </div>
                        </div>
                    </div>
                    
            
                </div>
                </form>
            <!-- Widgets End -->

        </div>
        <!-- Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
<footer>
</footer>
</html>

    