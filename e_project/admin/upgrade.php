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

$query23="SELECT A.b_address , B.name from branch as A inner join city as B where A.b_city=B.id";
$con=mysqli_query($connect,$query23);


?>
<?php

$id=$_GET['id1'];
$name=$_GET['name1'];
$email=$_GET['email1'];
$contact=$_GET['contact1'];

if(isset($_POST['register'])){
  $idd=$_POST['id'];
  $s_name=$_POST['name'];
  $s_email=$_POST['email'];
  $s_contact=$_POST['contact'];
  $s_password=$_POST['password'];
  $s_re_pass=$_POST['repassword'];
  $branch=$_POST['branch'];
  $roles=3;
  $query1="SELECT * FROM `cagent` where `email`='$s_email' or `user_name`='$s_name'";
  $select1=mysqli_query($connect,$query1);
  $rows=mysqli_num_rows($select1);
  if($rows>1)
  {
      echo'<script>alert("Account Already Registered")</script>';
  }
  else if($s_password==$s_re_pass)
  {
      $query2="UPDATE `cagent` SET `id`=' $idd',`user_name`='$s_name',
      `email`='$s_email',`contact`='$s_contact',`password`='$s_password'
      ,`confirm_password`='$s_re_pass',`branch`='$branch' WHERE `id`='$idd'";
      mysqli_query($connect,$query2);
      echo'<script>alert("Account Ubdate Successfully")</script>'; 
  }
  else
  {
      echo'<script>alert("Password does not match")</script>'; 
  }
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
                            <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                        <h1 class="mt-4">Update Agent</h1>
<hr>

                    <!-- form -->
    </div>  

            <form class="CAform" method="POST">

            <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <input type="number" name="id" value=<?php echo $id?> min=<?php echo $id?> max=<?php echo $id?> class="form-control form-control-lg fieldAg" placeholder="ID" required style="text-align:center"> 
                  </div>

                </div>
              </div>
<br>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <input type="text" name="name" value=<?php echo $name?> pattern="[A-Za-z]{1,50}[1-9]{1,50}" title="[A-Za-z][1-9] e.g usman131 OR Usman121" class="form-control form-control-lg fieldAg" placeholder="Username" pattern="[A-Za-z]+[1-9]" title="[A-Za-z][1-9] e.g usman131 OR Usman121" required> 
                  </div>

                </div>
              </div>
<br>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <input type="email" name="email" value=<?php echo $email?> class="form-control form-control-lg fieldAg" pattern="[a-z1-9]+@Cagent.com" title="[a-z1-9]@Cagent.com" placeholder="Email" required>
                  </div>

                </div>
              </div>
<br>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <input type="tel" name="contact" value=<?php echo $contact?> pattern="[0-9]{4)-[0-9]{7}" class="form-control form-control-lg fieldAg" placeholder="Contact" required>
                  </div>

                </div>
              </div>
<br>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="password" class="form-control form-control-lg fieldAg" placeholder="Password" required>
                  </div>
<br>
                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="repassword"  class="form-control form-control-lg fieldAg" placeholder="Re-type Password" required>
                  </div>
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                <div class="form-outline">
                    <h3>Select Branch</h3>
                <select name="branch" class="form-control form-control-lg fieldAg" id="name" placeholder="branch" required>
                    <optgroup label="SELECT BRANCH">      
                <?php
                while($row=mysqli_fetch_assoc($con))
                {
                echo "<option>". $row['b_address']. "</option>" ;
                }
                ?>   
                     </optgroup>                
                </select>
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
