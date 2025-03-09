<?php
include 'connection.php';
session_start();
if($_SESSION['agent'])
{

}
else
{
    header('location:../login.php');
}
$u_name=$_SESSION['agent'];

$query="SELECT * FROM `cagent` WHERE 	user_name='$u_name'"; 
$con=mysqli_query($connect,$query);
$fetch=mysqli_fetch_assoc($con);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard CMS</title>
        <?php echo '<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="admin.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/e613a04307.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>'
    ?>
        </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">COURIER <span class="ser">SERVICES</span></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                 <h3><?php echo $_SESSION['agent']?></h3>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard 
                            </a>
                            <hr>
                
                            <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Courier
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="createbill.php">
                                        Create Bill
                                        <div class="sb-sidenav-collapse-arrow"></div>
                                    </a>
                                    <a class="nav-link collapsed" href="updatebill.php">
                                        Update Bill
                                        <div class="sb-sidenav-collapse-arrow"></div>
                                    </a>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                                <div class="sb-nav-link-icon"><i class="fas fa-ship"></i></div>
                                Shipment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="manageship.php">
                                        Manage Shipment
                                        <div class="sb-sidenav-collapse-arrow"></div>
                                    </a>
                                    <a class="nav-link collapsed" href="viewship.php">
                                        View Shipment
                                        <div class="sb-sidenav-collapse-arrow"></div>
                                    </a>
                                    </div>     



<hr>
                            <div class="sb-sidenav-menu-heading">Extra</div>

                            <a class="nav-link" href="report.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                                Report
                            </a>

                            <a class="nav-link" href="status.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                                Status
                            </a>
                            <a class="nav-link" href="feedback.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Feedback
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Courier Services
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Courier</h1>
<hr>

                    <!-- form -->
  

            <form class="CAform" method="POST" action="upbillinfo.php">

            <h4 style="text-align:left !important" class="CSR">Tracking_ID</h4>
            <br>            
            <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <input type="text" name="tracking" class="form-control form-control-lg fieldAg"  placeholder="Enter Tracking ID for update bill" required>
                  </div>
                </div>
              </div>
<br>
<!--Courier type-->
            <h4 style="text-align:left !important" class="CSR">Courier_Type</h4>
            <br>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <input type="text" name="parcelName" class="form-control form-control-lg fieldAg"  id="name" pattern="[A-Za-z]+[a-z]" title="only first alphabet allowed in uppercase" placeholder="Parcel_Name" required>
                  </div>
                </div>
              </div>
<br>
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <input type="number" name="weight" min="20" class="form-control form-control-lg fieldAg" id="name" placeholder="Weight count in kg" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <input type="number" name="height" min="5" class="form-control form-control-lg fieldAg" id="name" placeholder="Height count in ft" required>
                  </div>
                </div>
              </div>
<br>

<!--Sender_Information-->

<h4 style="text-align:left !important" class="CSR">Sender_Information</h4>
<br>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <input type="text" name="senderName" class="form-control form-control-lg fieldAg" id="name" pattern="[A-Za-z]+[a-z]" title="only first alphabet allowed in uppercase" placeholder="Sender_Name" required>
                  </div>
                </div>
              </div>
<br>
              <div class="row">
                <div class="col-md-4 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="email" name="email" class="form-control form-control-lg fieldAg" id="name" pattern="[A-Za-z1-9]+@gmail.com" title="[A-Za-z1-9]+@gmail.com e.g Nadir12@gmail.com" placeholder="Sender_Email" required>
                  </div>
                </div>
                <br>
                <div class="col-md-4 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="tel" name="contact" pattern="[0-9]{4}-[0-9]{7}" class="form-control form-control-lg fieldAg" id="name" required placeholder="Sender_Contact">
                  </div>
                </div>
                <br>
                <div class="col-md-4 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="text" name="sAddress" class="form-control form-control-lg fieldAg" id="name" pattern="[A-Za-z]\w{0,10}[0-9]\d{0,10}-[A-Za-z]\w{0,50}" title="HomeAddress-city e.g k21-karachi" placeholder="Sender_Address" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <input type="text" value="<?php echo $fetch['branch']?>" name="branch" class="form-control form-control-lg fieldAg" style="color:black !important;text-align:center" required readonly>
                  </div>
                </div>
              </div>

              <br>

              <h4 style="text-align:left !important" class="CSR">Receiver_Information</h4>              
<br>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="text" name="receiverName" class="form-control form-control-lg fieldAg" id="name" pattern="[A-Za-z]+[a-z]" title="only first alphabet allowed in uppercase" placeholder="Receiver_Name" required>
                  </div>
                </div>
                <br>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="text" name="rAddress" class="form-control form-control-lg fieldAg" id="name" pattern="[A-Za-z]\w{0,10}[0-9]\d{0,10}-[A-Za-z]\w{0,50}" title="HomeAddress-city e.g k21-karachi" placeholder="Receiver_Address" required>
                  </div>
                </div>
              </div>




              <div class="mt-4 pt-2">
                <input class="btnnn btn-lg" type="submit" value="Submit" name="register"/>
              </div>
<br>
            </form>

<hr>
<br>

<h3>Agent Responsibilities</h3>
<ul>
<li>Deliver various items to different addresses as assigned.</li> <br>
<li>Stick to a schedule and be time-bound on the job.</li><br>
<li>Follow the prescribed routes most convenient for delivery.</li><br>
<li>Load and unload the vehicle as needed.</li><br>
<li>Inspect, operate and maintain the vehicle and its cleanliness.</li>
</ul>
<!-- form end -->
</div>  



       
                <br>
                </main>
                <footer class="py-4 mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright  2023 &copy; view more?</div>
                        </div> 
                    </div>
                </footer>
            </div>
        </div>
      <?php
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>'
        ?>
    </body>
</html>
