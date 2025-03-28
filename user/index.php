<?php
include 'connection.php';
session_start();
$_SESSION['senderName']=null;


if($_SESSION['name'])
{

}
else
{
    header('location:../index.php');
}

$feed="SELECT * FROM `feedback`";
$user="SELECT * FROM `sign_in_up` WHERE `roles`= 2";
$complete="SELECT * FROM `courier_details` WHERE `status`= 'Complete'";
$query1=mysqli_query($connect,$feed);
$query2=mysqli_query($connect,$user);
$query3=mysqli_query($connect,$complete);
$fcount=mysqli_num_rows($query1);
$usercount=mysqli_num_rows($query2);
$ccount=mysqli_num_rows($query3);

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
                <a href="index.php" class="nav-item nav-link active text-dark fw-bolder">Home</a> 
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
    <!-- Navbar End -->

    <a href="viewm.php" class="fix">M</a>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Developed by usman,haider and sana</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Courier <span class="text-secondary">Services</span></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Place courier here</p>
                                <a href="courierdetail.php" class="btn py-md-3 px-md-5 me-3 animated slideInLeft bg-secondary text-dark">Add Courier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Developed by usman,haider and sana</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Courier <span class="text-secondary">Services</span></h1>
                                <a href="courierdetail.php" class="btn py-md-3 px-md-5 me-3 animated slideInLeft bg-secondary text-dark">Add Courier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0 bg-dark">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/istockphoto-511661096-170667a.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="text-white text-uppercase mb-3">About Us</h4>
                    <h1 class="mb-5 text-secondary">Courier Services</h1>
                    <p class="mb-5 text-white">A courier service is a premium, all-inclusive service which collects and delivers shipments in the shortest possible time frame, while postal services are generally used for transporting letters and parcels which can sometimes take some time to arrive at their final destination.</p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-globe fa-3x text-secondary mb-3"></i>
                            <h5 class="text-white">Global Coverage</h5>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-shipping-fast fa-3x text-secondary mb-3"></i>
                            <h5 class="text-white">On Time Delivery</h5>
                        </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="text-secondary text-uppercase mb-3 text-white" >Some Facts</h4>
                    <h1 class="mb-5 text-secondary">#1 Place To Manage All Of Your Shipments</h1>
                    <p class="mb-5 text-white">A Shipping Order (SO) is a document issued by the carrier that confirms a shipment's booking on a vessel. An SO will contain the location of the empty container for pickup, and may also contain booking details like the vessel number and sailing time.</p>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $usercount ?></h2>
                                <p class="text-white mb-0">Happy Clients</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-ship fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $ccount ?></h2>
                                <p class="text-white mb-0">Complete Shipments</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $fcount ?></h2>
                                <p class="text-white mb-0">Customer Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Feature Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="text-secondary text-uppercase mb-3 text-white">Our Features</h4>
                    <div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-globe text-primary fa-3x flex-shrink-0 text-secondary"></i>
                        <div class="ms-4">
                            <h5 class="text-secondary">Worldwide Service</h5>
                            <p class="mb-0 text-white">It connected the world in a way that made it much easier for people to get information, share, and communicate.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-5 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-shipping-fast text-primary fa-3x flex-shrink-0 text-secondary"></i>
                        <div class="ms-4">
                            <h5 class="text-secondary">On Time Delivery</h5>
                            <p class="mb-0 text-white">On time delivery, or OTD, is the metric used to measure supply chain efficiency.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-0 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-headphones text-primary fa-3x flex-shrink-0 text-secondary"></i>
                        <div class="ms-4">
                            <h5 class="text-secondary">24/7 Telephone Support</h5>
                            <p class="mb-0 text-white">Providing high levels of customer support — and that includes 24/7 provision — goes a long way toward enhancing the customer journey and experience, as well as the credibility of your brand</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Pricing Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="text-white text-uppercase">Pricing Plan</h4>
                <h1 class="mb-5 text-secondary">Perfect Pricing Plan</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class=" mb-1 text-white">Basic Plan</h5>
                            <h1 class="display-5 mb-0 text-secondary">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49.00<small
                                    class="align-bottom text-white" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Product weght : 10kg (max)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Pakistan (only)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Duaration : 10 days </p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Support : yes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class="text-primary mb-1 text-white">Secondary Plan</h5>
                            <h1 class="display-5 mb-0 text-secondary">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99.00<small
                                    class="align-bottom text-white" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Product weght : 20kg (max)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Pakistan (only)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Duaration : 7 days </p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Support : yes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class="text-primary mb-1 text-white">Premium Plan</h5>
                            <h1 class="display-5 mb-0 text-secondary">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149.00<small
                                    class="align-bottom text-white" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Product weght : 30kg (max)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Pakistan (only)</p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Duaration : 5 days </p>
                            <p class="text-white" ><i class="fa fa-check text-success me-3"></i>Support : yes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                <h6 class="text-white text-uppercase">Testimonial</h6>
                <h1 class="mb-0 text-secondary">Our Teachers Say!</h1>
            </div><br><br>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="img/1024px-User-avatar.svg_.png" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1 text-secondary">Sir Mohsin</h5>
                            <p class="m-0 text-white">Teacher</p>
                        </div>
                    </div>
                    <p class="mb-0 text-secondary">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="img/1024px-User-avatar.svg_.png" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1 text-secondary">Sir Emad</h5>
                            <p class="m-0 text-white">Teacher</p>
                        </div>
                    </div>
                    <p class="mb-0 text-secondary">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="img/1024px-User-avatar.svg_.png" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1 text-secondary">Sir Saim</h5>
                            <p class="m-0 text-white">Teacher</p>
                        </div>
                    </div>
                    <p class="mb-0 text-secondary">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="img/1024px-User-avatar.svg_.png" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1 text-secondary">Miss Wajiha</h5>
                            <p class="m-0 text-white">Teacher</p>
                        </div>
                    </div>
                    <p class="mb-0 text-secondary">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    


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