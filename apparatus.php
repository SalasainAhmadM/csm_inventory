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
    <title>Apparatus - CSM Inventory System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/csmlogo.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Evogria">
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
                    <a style="font-family: 'Evogria', sans-serif;"href="apparatus.php" class="nav-item nav-link active"><i class="fas fa-bong"></i>Apparatus</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="chemicals.php" class="nav-item nav-link"><i class="fas fa-wine-bottle"></i>Chemicals</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="ctrlchem.php" class="nav-item nav-link"><i class="fas fa-vials"></i>Controlled Chem</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="equipment.php" class="nav-item nav-link"><i class="fas fa-cog"></i>Equipment</a>
                    <!--
                    <a style="font-family: 'Evogria', sans-serif;" href="borrowing.php" class="nav-item nav-link"><i class="fas fa-hands"></i>Borrowing</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="breakage.php" class="nav-item nav-link"><i class="fas fa-heart-broken"></i>Breakage</a>
                    <a style="font-family: 'Evogria', sans-serif;" href="clearance.php" class="nav-item nav-link"><i class="fas fa-book-open"></i>Clearance</a>
                  -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav style="box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);" 
            class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="" class="navbar-brand d-flex d-lg-none me-4">
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
            <div style="background-color: lightgray; padding: 10px;" class="main_contents">
                <div class="container " >
                  <br>
                 <br>
                 <h5 style="font-weight: bolder; font-family: 'Evogria', sans-serif;">Apparatus</h5>
                 <!--
                       <div class="alert alert-success alert-dismissable"  data-bs-dismiss="alert" role="alert" style="font-size:13px">
                        Chemicals Updated Successfully!
                       <button type="button" style="float:right" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                       <div class="alert alert-success alert-dismissable"  data-bs-dismiss="alert" role="alert" style="font-size:13px">
                        Chemicals Deleted Successfully!
                       <button type="button" style="float:right" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                       <div class="alert alert-success alert-dismissable"  data-bs-dismiss="alert" role="alert" style="font-size:13px">
                        Chemicals Added Successfully!
                       <button type="button" style="float:right" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                -->
                <div>
                <button class="btn btn-dark mb-3 mt-4" style="font-size:13px; font-family: 'Evogria', sans-serif;"data-bs-toggle="modal" data-bs-target="#apparatus"><i class="fas fa-plus-circle"></i>Add</button>
                                  
                                  <div class="modal fade" id="apparatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content"style="background-color: lightgray;width: 387px;"class="card mt-3 shadow">
                                        <div class="modal-header">
                                          <h6 class="mb-1"style="font-weight: bolder; font-family: 'Evogria', sans-serif; ">Add Apparatus</h6>
                                        </div>
                                        <div class="modal-body">
                                     
                                            <div class="row">
                              
                                                <div class="col-md-8">
                            
                                            <h6 style="font-size:14px">
                                           
                                    Apparatus Name
                                    <input type="text" class="form-control mb-3" style="font-size:13px; width: 355px;" name="apparatusname" required>
                            
                                   Volume / Mass
                                    <input type="number" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="volume">
                            
                                   Stocks
                                   <input type="number" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="stocks">
                                   Date:
                                   <input type="date" id="start" value="2023-02-24"min="2023-01-01" max="2040-12-31"
                                   class="form-control mb-3" style="font-size:13px; width: fit-content;"name="date">
                                            </h6>
                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group" style="float:right; ">
                                                <a aria-label="close" data-bs-dismiss="modal" class="btn btn-light text-danger border-dark" style="font-size:12px;margin:right;">Cancel</a>
                                                <button type="submit" name="apparatus" class="btn btn-secondary" style="font-size:14px; font-family: 'Evogria', sans-serif;">Update</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="mytable_length">
                        <label>
                            <select name="mytable_length" aria-controls="mytable" class="form-select form-select-sm" fdprocessedid="pflky">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 col-md-6">
                        <div id="mytable_filter" class="dataTables_filter">
                        <label>
                            <input type="search" class="form-control form-control-sm" placeholder="Search Apparatus" aria-controls="mytable">
                        </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-sm table-striped dataTable no-footer" style="font-size:13px" id="mytable" aria-describedby="mytable_info">
                    <thead>
                      <tr>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" 
                        style="width: 70px;font-family: 'Evogria', sans-serif;">Number</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="Apparatus Name: activate to sort column ascending" 
                        style="font-family: 'Evogria', sans-serif;">Apparatus Name</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending" 
                        style="width: 140px;font-family: 'Evogria', sans-serif;">Brand</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="Stocks: activate to sort column ascending" 
                        style="width: 70px;font-family: 'Evogria', sans-serif;">Stocks</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" 
                        style="width: 150px;font-family: 'Evogria', sans-serif;">Date Added</th>
                       <!-- <th scope="col" class="sorting" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-label="Expire: activate to sort column ascending" 
                        style="width: 150px;font-family: 'Evogria', sans-serif;">Expiration</th>-->
                        <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="mytable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Action: activate to sort column descending" 
                        style="width: 20.425px;font-family: 'Evogria', sans-serif;">Modify</th>
                     </tr>
                    </thead>
                    <tbody>
                    <tr class="even">
                        
                        <td>1</td>
                        <td>Tube 8</td>
                        <td>Pyrex</td>
                        <td>100</td>
                        <td>February 20, 2023</td>
                       <!--  <td>August 20, 2023</td>-->
                        <td class="sorting_1">
                            <div class="btn-group">
                                <button class="btn btn-light text-primary" style="font-size:13px"data-bs-toggle="modal" data-bs-target="#editapparatus"><i class="fas fa-edit"></i></button>
                                  
                                <div class="modal fade" id="editapparatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content"style="background-color: lightgray;width: 387px;"class="card mt-3 shadow">
                                      <div class="modal-header">
                                        <h6 class="mb-1"style="font-weight: bolder; font-family: 'Evogria', sans-serif; ">Edit Apparatus</h6>
                                      </div>
                                      <div class="modal-body">
                                   
                                          <div class="row">
                            
                                              <div class="col-md-8">
                          
                                          <h6 style="font-size:14px">
                                         
                                 Apparatus Name
                                  <input type="text" class="form-control mb-3" style="font-size:13px; width: 355px;" name="apparatusname" required>
                          
                                 Brand
                                  <input type="text" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="brand">
                          
                                 Stocks
                                 <input type="number" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="stocks">
                                 Date:
                                 <input type="date" id="start" value="2023-02-24"min="2023-01-01" max="2040-12-31"
                                 class="form-control mb-3" style="font-size:13px; width: fit-content;"name="date">
                                          </h6>
                          
                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <div class="btn-group" style="float:right; ">
                                              <a aria-label="close" data-bs-dismiss="modal" class="btn btn-light text-danger border-dark" style="font-size:12px;margin:right;">Cancel</a>
                                              <button type="submit" name="editapparatus" class="btn btn-secondary" style="font-size:14px; font-family: 'Evogria', sans-serif;">Update</button>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              <button class="btn btn-light text-danger" style="font-size:13px;" fdprocessedid=""data-bs-toggle="modal" data-bs-target="#exampleModal38"><i class="fas fa-trash" ></i></button>
                    
                          
                    
                    
                    <div class="modal fade" id="exampleModal38" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h6 class="modal-title text-danger" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                       
                          <h6 style="font-size:14px">Please type "DELETE" to confirm.</h6>
                         
                          <input type="text" class="form-control inkey" style="text-transform:uppercase;font-size:14px" data-id="38">
                    
                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                            
                            </div>
                          </td>
                      </tr></tbody>

                      <tbody>
                        <tr class="even">
                            
                            <td>2</td>
                            <td>Tube 18</td>
                            <td>Ordinary</td>
                            <td>90</td>
                            <td>February 20, 2023</td>
                          <!--   <td>August 20, 2023</td> -->
                            <td class="sorting_1">
                                <div class="btn-group">
                                  <button class="btn btn-light text-primary" style="font-size:13px"data-bs-toggle="modal" data-bs-target="#editapparatus"><i class="fas fa-edit"></i></button>
                                  
                                  <div class="modal fade" id="editapparatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content"style="background-color: lightgray;width: 387px;"class="card mt-3 shadow">
                                        <div class="modal-header">
                                          <h6 class="mb-1"style="font-weight: bolder; font-family: 'Evogria', sans-serif; ">Edit Apparatus</h6>
                                        </div>
                                        <div class="modal-body">
                                     
                                            <div class="row">
                              
                                                <div class="col-md-8">
                            
                                            <h6 style="font-size:14px">
                                           
                                   Apparatus Name
                                  <input type="text" class="form-control mb-3" style="font-size:13px; width: 355px;" name="apparatusname" required>
                          
                                   Brand
                                  <input type="text" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="brand">
                          
                                   Stocks
                                   <input type="number" class="form-control mb-3" style="font-size:13px; width: fit-content;" name="stocks">
                                   Date:
                                   <input type="date" id="start" value="2023-02-24"min="2023-01-01" max="2040-12-31"
                                   class="form-control mb-3" style="font-size:13px; width: fit-content;"name="date">
                                            </h6>
                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group" style="float:right; ">
                                                <a aria-label="close" data-bs-dismiss="modal" class="btn btn-light text-danger border-dark" style="font-size:12px;margin:right;">Cancel</a>
                                                <button type="submit" name="editapparatus" class="btn btn-secondary" style="font-size:14px; font-family: 'Evogria', sans-serif;">Update</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <button class="btn btn-light text-danger" style="font-size:13px;" fdprocessedid=""data-bs-toggle="modal" data-bs-target="#exampleModal38"><i class="fas fa-trash" ></i></button>
                        
                              
                        
                        
                        <div class="modal fade" id="exampleModal38" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title text-danger" id="exampleModalLabel">Confirm Delete</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                           
                              <h6 style="font-size:14px">Please type "DELETE" to confirm.</h6>
                             
                              <input type="text" class="form-control inkey" style="text-transform:uppercase;font-size:14px" data-id="38">
                        
                              </div>
                              <div class="modal-footer">
                               
                              </div>
                            </div>
                          </div>
                        </div>
                                
                                </div>
                              </td>
                          </tr></tbody>
                  </table></div></div>
            
            
            
               
               </div> 
            </div>
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