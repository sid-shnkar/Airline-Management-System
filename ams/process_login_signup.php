<?php

// ** NOTE: This php file will take the user to admin dashboard if he/she is admin
// otherwise it will redirect the user to passenger dashboard for login/signup


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    

    if($_POST["pass_login"])
    {
        header("Location: passenger_login_signup/passenger_login.php");
    }
    else if($_POST["admin_login"])
   {
    header("Location: admin_login/admin_login.php");
   }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login/Signup | Airline Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  
  <link href="assets_welcome_page/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            font: 14px sans-serif;
            width: 900px; padding: 20px;
          text-align: center; }

    </style>

  <link href="assets_welcome_page/css/style.css" rel="stylesheet">

  <style>


#header .logo {
      font-size: 20px;
      margin: 0;
      padding: 0;
      line-height: 1;
      font-weight: 450;
      letter-spacing: 1px;
      text-transform: uppercase;
    }
    
    #header .logo img {
      max-height: 40px;
    }
    

    .col-sm-3 {
    width: 100%;
  }

    </style>

</head>

<body>

  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
  
    <a href="index.php" class="logo me-auto"><img src="assets_welcome_page/img/iitdh_logo.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="index.php">Airline Management System</a></h1>

     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          <li><a class="nav-link scrollto active" href="process_login_signup.php">Book now</a></li>
          <li><a class="nav-link   scrollto" href="search_flights.php">Search flights</a></li>
          <li><a class="nav-link scrollto" href="https://github.com/Sid-Shankar/SSL_Project" target="_blank">Github</a></li>
          <li><a class="nav-link scrollto" href="index.php#faq">FAQ</a></li>
          <li><a class="getstarted scrollto" href="process_login_signup.php">Login/Signup</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <main id="main">

  
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Login/Signup</li>
        </ol>
        <h2>Login/Signup details</h2>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <p>

        </p>


        <div class="container-fluid h-100">
          <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
            <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <h2>For Passenger login/signup, click below.</h2>
                <br>
                <input type="submit" class="btn btn-danger" value="Passenger Login" name="pass_login">
                <br>
                <br>
               <h2>For Administrator login, click below.</h2>
               <br>
                <input type="submit" class="btn btn-warning" value="Admin Login" name="admin_login" ><br>
            </div>
        </form>
        <br>
<br>
<br> <br>
<h2 style="color: rgb(216, 87, 13);"><u><b>Note:</b></u>&nbsp;It is mandatory for passengers to login/signup in order to book tickets.</h2>
    </div>

            </div>


          </div>
        </div>

      </div>



    </section>

  </main>

  
  <footer id="footer">


    

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Airline Management system | CS213: SSL Course Project Autumn 2021</span></strong>
      </div>
    </div>
  </footer>

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

    <!-- Below are some javascripts files required for the animation and display features for this page  -->

  <script src="assets_welcome_page/vendor/aos/aos.js"></script>
  <script src="assets_welcome_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_welcome_page/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_welcome_page/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets_welcome_page/vendor/php-email-form/validate.js"></script>
  <script src="assets_welcome_page/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_welcome_page/vendor/waypoints/noframework.waypoints.js"></script>

  
  <script src="assets_welcome_page/js/main.js"></script>

</body>

</html>