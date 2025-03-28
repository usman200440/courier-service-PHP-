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

if(isset($_POST['submit']))
{
    $n=$_SESSION['name'];
    $search=$_POST['search'];
    $_SESSION['s']=$search;
    $query="SELECT * FROM `courier_details` WHERE `tracking_id`='$search' && `sender_name`='$n'";
    $con=mysqli_query($connect,$query);
    $con1=mysqli_query($connect,$query);
    $con2=mysqli_query($connect,$query);
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
                <a href="index.php" class="nav-item nav-link text-white fw-bolder">Home</a> 
                <a href="about.php" class="nav-item nav-link text-white fw-bolder">About</a>
                <a href="contact.php" class="nav-item nav-link text-white fw-bolder">Contact</a>
                <a href="tracking.php" class="nav-item nav-link active text-dark fw-bolder">Tracking</a>
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
    <!-- Navbar End -->
<br><br>
<div class="container">
<h1 class="mb-5 text-secondary">Track Your Courier</h1>
<form method="post" class="sform">
<label for="" class="btsu1">Enter tracking ID :</label>
<input type="search" name="search" placeholder="D32RG1D4-9CIU-1K67J742" class="search" autocomplete="off">
<input type="submit" value="SEARCH" name="submit" class="btsu">
</form>
</div>

 <!-- About Start -->
 <div class="container-fluid overflow-hidden py-5 px-lg-0 bg-dark">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100 img1" src="img/1.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    

 <table class="table dataTable-table center">
  <thead>
    <tr>
      <th scope="col">Sender_Name</th>
      <th scope="col">Reciever_Name</th>
      <th scope="col">Sender_Address</th>
      <th scope="col">Reciever_Address</th>
    </tr>
  </thead>
<?php
if(isset($_POST['submit'])){
    if($row=mysqli_fetch_assoc($con)){
echo'
    <tbody>
    <tr>
      <td>'.$row['sender_name'].'</td><br>
      <td>'.$row['reciever_name'].'</td>
      <td>'.$row['sender_address'].'</td>
      <td>'.$row['reciever_address'].'</td>
    </tr>';
    }

   

}

?>

</tbody>
</table>

<br>

<table class="table dataTable-table center">
  <thead>
    <tr>
     <th scope="col">Parcel_Name</th>
      <th scope="col">Weight</th>
      <th scope="col">Price</th>
      <th scope="col">Sender_contact</th>
    </tr>
  </thead>
<?php
if(isset($_POST['submit'])){
    if($row1=mysqli_fetch_assoc($con1)){
        echo ' 
        <tbody>
        <tr>
          <td>'.$row1['parcel'].'</td>
          <td>'.$row1['weight'].'</td>
          <td>'.$row1['amount'].'</td>
          <td>'.$row1['sender_contact'].'</td>
        </tr>';
    }


    }
    
?>

</tbody>
</table>


<br>

<table class="table dataTable-table text-center">
  <thead>
    <tr>
      <th scope="col">Branch</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
<?php
if(isset($_POST['submit'])){
    if($row2=mysqli_fetch_assoc($con2))
    {
        echo ' 
        <tbody>
        <tr>
          <td>'.$row2['branch'].'</td>
          <td>'.$row2['status'].'</td>
          <td>'.$row2['date'].'</td>
        </tr>';
    }
        
        else{
echo"<script>alert('invalid Tracking id')</script>";
        }
    }

?>
</tbody>
</table>
<br>


 <a href='download.php' class='text-secondary' target='_blank'>Download</a>
 


                
                  
        </div>

    </div>
    <br>
    
    <!-- About End -->










    <!-- Footer Start -->
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
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-secondary text-dark btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up fw-bolder"></i></a>


    <!-- JavaScript Libraries -->
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
    <script>
if(window.history.replaceState){
window.history.replacestate(null,null,window.location.href);
}

</script>
    '
    ?>
</body>

</html>