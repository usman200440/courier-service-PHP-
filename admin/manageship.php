<?php
include 'connection.php';
session_start();
if($_SESSION['name1'])
{

}
else
{
    header('location:../login.php');
}
if(isset($_POST['submit'])){
    $status=$_POST['status'];
$query="SELECT * FROM `courier_details` where `status`='$status'";
$select=mysqli_query($connect,$query);
$select1=mysqli_query($connect,$query);
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
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        '
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
                 <h3><?php echo $_SESSION['name1']?></h3>
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
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Agent
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Cagent.php">Create Agents</a>
                                    <a class="nav-link" href="ViewAgent.php">View Agents</a>
                                </nav>
                            </div>
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

                                    <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
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
                               
                            <a class="nav-link" href="alluser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                OverALL users
                            </a>
<hr>
                            <div class="sb-sidenav-menu-heading">Extra</div>

                            <a class="nav-link" href="report.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                                Report
                            </a>
                            
                            <a class="nav-link" href="branch.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-code-branch"></i></div>
                                Add_Branch
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
                <h1 class="container">Manage Shipment</h1>
                <br>
                <br>
                <h4 class="CSR">Search Courier with respect to Status</h4> <br>
                <form method='POST' >
        <select name='status' class='form-control form-control-lg fieldAg'>
            <option>Pending</option>
            <option>On the way</option>
            <option>Complete</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Search" name="submit" class="btnnn btn-lg">
</form>
<hr>
                <table class="table1 dataTable-table container">
  <thead>
    <tr>
      <th scope="col"class="th">ID</th>
      <th scope="col"class="th">Tracking_Id</th>
      <th scope="col"class="th">Parcel</th>
      <th scope="col"class="th">Sender_Name</th>
      <th scope="col"class="th">Receiver_Name</th>
    </tr>
  </thead> 

  <?php
  if(isset($_POST['submit'])){
  while($row1=mysqli_fetch_assoc($select1))
  {
      echo ' 
      <tbody>
      <tr>
        <td>'.$row1['id'].'</td>
        <td>'.$row1['tracking_id'].'</td>
        <td>'.$row1['parcel'].'</td>
        <td>'.$row1['sender_name'].'</td>
        <td>'.$row1['reciever_name'].'</td>
      </tr>';
  }
}
  ?>
</tbody>
</table>

<table class="table1 dataTable-table container">
  <thead>
    <tr>
      <th scope="col"class="th">Sender_Address</th>
      <th scope="col"class="th">Receiver_Address</th>
      <th scope="col"class="th">Status</th>
      <th scope="col"class="th">Amount</th>
      <th scope="col"class="th">Date</th>
      <th scope="col"class="th">Weight</th>
    </tr>
  </thead> 

  <?php
  if(isset($_POST['submit'])){
  while($row=mysqli_fetch_assoc($select))
  {
      echo ' 
      <tbody>
      <tr>
        <td>'.$row['sender_address'].'</td>
        <td>'.$row['reciever_address'].'</td>
        <td>'.$row['status'].'</td>
        <td>'.$row['amount'].'</td>
        <td>'.$row['date'].'</td>
        <td>'.$row['weight'].'</td>
      </tr>';
  }
}
  ?>
</tbody>
</table>



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
