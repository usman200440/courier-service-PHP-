<?php
include 'connection.php';
session_start();

if($_SESSION['name'])
{

}
else
{
    header('location:../login.php');
}

function GUID()
{
if(function_exists('com_create_guid')===true)
{
    return trim(com_create_guid(),"{}");
}
   return sprintf("%04X%04X-%04X-%04X%04X",
   mt_rand(0,65356),mt_rand(0,65356),mt_rand(30000,60000)
   ,mt_rand(0,65356),mt_rand(0,65356));
}


$tracking=GUID();
$s_name=$_SESSION['senderName'];
$s_email=$_SESSION['email'];
$s_contact=$_SESSION['contact'];
$s_address=$_SESSION['sAddress'];
$s_branch=$_SESSION['branch'];
$parcel_name=$_SESSION['p_name'];
$weight=$_SESSION['weight'];
$height=$_SESSION['height'];
$r_name=$_SESSION['receiverName'];
$r_address=$_SESSION['rAddress'];
$date=date("d/m/Y");
if(isset($_POST['submit4'])){
    $_SESSION['feedback']=$_POST['feedback'];
    $feedback=$_SESSION['feedback'];
}

$price;

if($weight>=20 && $weight<=100)
{
    $price=100;
}
else if($weight>=101 && $weight<=200)
{
    $price=200;
}
else if($weight>=201 && $weight<=300)
{
    $price=300;
}
else if($weight>=301 && $weight<=400)
{
    $price=400;
}
else if($weight>=401 && $weight<=500)
{
    $price=500;
}
else if($weight>=501 && $weight<=700)
{
    $price=800;
}
else if($weight>=701 && $weight<=1000)
{
    $price=1200;
}
else if($weight>1000)
{
    $price=1500;
}

if(isset($_POST['submit4']))
{
$totalbill="INSERT INTO `courier_details`(`id`, `parcel`,
 `sender_name`, `sender_address`, `sender_email`, `reciever_name`,
  `reciever_address`, `branch`, `weight`, `height`, `sender_contact`,
   `tracking_id`, `amount`,`status`) VALUES
    (null,'$parcel_name','$s_name','$s_address',
    '$s_email','$r_name','$r_address','$s_branch','$weight',
    '$height','$s_contact','$tracking','$price','pending')";
    mysqli_query($connect,$totalbill);

$feedback="INSERT INTO `feedback`(`id`, `feedbacks`) VALUES (null,'$feedback')";
mysqli_query($connect,$feedback);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Courier Services</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php
echo'
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">';
    ?>

</head>

<body class="bg-dark">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow border-top border-5 border-dark sticky-top p-0 bg-secondary">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5 bg-dark">
            <h2 class="mb-2 text-white"><span class="text-secondary">Courier </span>Services</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link text-dark fw-bolder">Home</a> 
                <a href="about.php" class="nav-item nav-link text-white fw-bolder">About</a>
                <a href="contact.php" class="nav-item nav-link text-white fw-bolder">Contact</a>
                <a href="tracking.php" class="nav-item nav-link text-white fw-bolder">Tracking</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark fw-bolder" data-bs-toggle="dropdown"><i class="fa fa-user text-drak me-3"></i><?php echo $_SESSION['name']?></a>
                    <div class="dropdown-menu fade-up m-0 bg-secondary border-none">
                        <a href="logout.php" class="dropdown-item bg-secondary text-dark">logout</a>
                    </div>
                </div>
                <p class="fw-bolder" style="opacity: 0 !important;">o12.oasad</p>
              </div>
        </div>
    </nav>

    <br>
<br>
<br>

<div class="container">
<div class="row">
<div class="col-sm-12 bg-dark  text-center bill">
<br>
<h1 class="text-secondary m">OverAll Information and bill</h1>
<br>
<br>
<h4 class="text-secondary">TRACKING_ID: <span class="text-white"><?php echo $tracking?></span></h4>
<h4 class="text-secondary">DATE: <span class="text-white"><?php echo $date?></span></h4>
<h4 class="text-secondary">TOTAL_BILL: <span class="text-white"><?php echo $price?>$ </span> with respect to weight</h4>
<br>
<hr>

<h3 class="text-white">Courier Type</h3>
<br>
<h5 class="text-secondary">Name: <span class="text-white"><?php echo $parcel_name?></span></h5>
<h5 class="text-secondary">Weight: <span class="text-white"><?php echo $weight?>kg</span></h5>
<h5 class="text-secondary">Height: <span class="text-white"><?php echo $height?>ft</span></h5>

<br>
<hr>

<h3 class="text-white">Sender Information</h3>
<br>
<h5 class="text-secondary">Sender_Name: <span class="text-white"><?php echo $s_name?></span></h5>
<h5 class="text-secondary">Sender_Email: <span class="text-white"><?php echo $s_email?></span></h5>
<h5 class="text-secondary">Sender_Contact: <span class="text-white"><?php echo $s_contact?></span></h5>
<h5 class="text-secondary">Sender_Address: <span class="text-white"><?php echo $s_address?></span></h5>
<h5 class="text-secondary">Select Branch: <span class="text-white"><?php echo $s_branch?></span></h5>

<br>
<hr>

<h3 class="text-white">Receiver Information</h3>
<br>
<h5 class="text-secondary">Receiver_Name: <span class="text-white"><?php echo $r_name?></span></h5>
<h5 class="text-secondary">Receiver_Address: <span class="text-white"><?php echo $r_address?></span></h5>

</div>
</div>
</div>
<br>
<br>
<br>

<div class="container-fluid">
    <div class="row">
<div class="col-sm-12 text-white">
<h2 class="text-secondary">Note:</h2>
<p>learn your tracking id for check the status</p>
</div>
    </div>
</div>



<!--footer-->
 <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-secondary mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Aptech North Nazimabad</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0331-1288350</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>usman67483@gmail.com</p>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-secondary mb-4">Services</h4>
                    <p class="btn btn-link">Air Freight</p>
                    <p class="btn btn-link">Sea Freight</p>
                    <p class="btn btn-link">Road Freight</p>
                    <p class="btn btn-link">Services Solutions</p>
                    <p class="btn btn-link">Industry solutions</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-secondary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="tracking.php">Tracking</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-secondary mb-4">Social Link</h4>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <br><br>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-secondary text-dark btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up fw-bolder"></i></a>

<?php
  echo'
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="script.js"></script>
    '
    ?>
    </body>
    </html>
