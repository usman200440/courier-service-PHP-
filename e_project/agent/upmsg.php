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

$query1="SELECT * FROM `cagent` WHERE 	user_name='$u_name'"; 
$con=mysqli_query($connect,$query1);
$fetch=mysqli_fetch_assoc($con);
$b=$fetch['branch'];

$id=$_GET["id"];
$name=$_GET["un"];
$tr=$_GET["tr"];
$st=$_GET["st"];
$query="SELECT * FROM `courier_details` WHERE `id`='$id'";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['register'])){
    $id1=$_POST['id1'];
    $msg=$_POST['message'];
    $trr=$_POST['tracking'];
    $name1=$_POST['name'];
    $stt=$_POST['status'];
$se="UPDATE `message` SET `status`='$stt' where `track`='$trr'";
mysqli_query($connect,$se);
echo'<script>alert("data updated successfully")</script>';



}

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
                
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
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
                <h1>Send_Message</h1>
<br>
<br>
    <form  method="POST" class="text-center">

    <h3 class="CSR">Name</h3>
                  <div class="form-outline container">
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control form-control-lg fieldAg" style="color:black !important;text-align:center"  required readonly>
                  </div>
<br>

        <div class="container">
        <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <h3 class="CSR">ID</h3>
                    <br>
                    <input type="text" name="id1" value="<?php echo $id?>" class="form-control form-control-lg fieldAg" required readonly style="color:black !important;text-align:center"> 
                  </div>
                </div>
              
<br>
             
                <div class="col-md-6 mb-4">
                    <h3 class="CSR">Message</h3>
                    <br>
                  <div class="form-outline">
                    <textarea name="message"  class="form-control form-control-lg fieldAg" cols="20" rows="5" ></textarea>
                  </div>
                </div>
              </div>
        </div>
<br>

                
<h3 class="CSR">Tracking</h3>
                  <div class="form-outline container">
                    <input type="text" name="tracking" value="<?php echo $tr?>" class="form-control form-control-lg fieldAg" style="color:black !important;text-align:center"  required readonly>
                  </div>
<br>
            
                
<h3 class="CSR">Status</h3>
<div class="form-outline container">
                    <input type="text" name="status" value="<?php echo $st?>" class="form-control form-control-lg fieldAg" style="color:black !important;text-align:center"  required readonly>
                  </div>
            


        <br>
        <div class="mt-4 pt-2">
                <input class="btnnn btn-lg" type="submit" value="Submit" name="register"/>
              </div>
<br>

    </form>



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
