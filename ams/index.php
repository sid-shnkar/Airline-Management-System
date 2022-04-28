<?php 
include "createdb.php";

// ** NOTE: This file will be responsible for the content displayed on welcome page
// like about us section, team members, faq etc.  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Airline management system</title>
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
    
    #hero .btn-get-started {
  font-family: "Jost", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 28px 11px 28px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px 0 0 0;
  color: #fff;
  background: #ee7a1b;
}
#hero .btn-get-started:hover {
  background: #db5d08;
}

    .col-sm-3 {
    width: 100%;
  }

    </style>

</head>

<body>

<!-- This part is for the top navigation bar containing link to different pages  -->

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets_welcome_page/img/iitdh_logo.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="index.php">Airline Management System</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="process_login_signup.php">Book now</a></li>
          <li><a class="nav-link   scrollto" href="search_flights.php">Search flights</a></li>
          <li><a class="nav-link scrollto" href="https://github.com/Sid-Shankar/SSL_Project" target="_blank">Github</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="getstarted scrollto" href="process_login_signup.php">Login/Signup</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <!-- This part is for the book now and search flights button along with the airplane picture -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">

        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Cheap.Secure.Fast.</h1>
          <h2>Book your flight tickets, now !</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="process_login_signup.php" class="btn-get-started scrollto">Book Now</a>
            <span>
              &nbsp;&nbsp;
              <a href="search_flights.php" class="btn-get-started scrollto">Search flights</a>
            </span>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets_welcome_page/img/slide3.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">
<!-- This part is for showing the partner airlines logos  -->

    <section id="cliens" class="cliens section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Partner Airlines</h2>
        </div>

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic6.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic7.png" class="img-fluid" alt="">
          </div>


        </div>

      </div>
    </section>

  <!-- This part contains the about us section desribing our project proposal in brief   -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Airline Management system offers you a wide variety of features. Some of which are listed below:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Search and book flights from all over the world.</li>
              <li><i class="ri-check-double-line"></i> You get an online check in option when you book with us.</li>
              <li><i class="ri-check-double-line"></i> Experience a smooth, fast booking experience.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Airline Management System is a dedicated and highly configurable system for all airlines, which can
              be easily accessed by all users. It helps the users to book flights without visiting offline booking
              counters. This system can be accessible by any user from any location at any time. In such a system, a
              passenger should be able to view the availability of flights’ details, as per their requirement. They can
              book the flights online and can also cancel the reservation. The administrator manages the passenger
              booking system and updates the reservation status.
            </p>
            <a href="Project_proposal.pdf" target="_blank" class="btn btn-warning">Project Proposal</a>
          </div>
        </div>

      </div>
    </section>


    <!-- This part describes some of the services which our website offers (display purpose only)  -->

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>These are some of the services we offer</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Worldwide coverage</a></h4>
              <p>Search and book flights from all over the world.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Online Check in</a></h4>
              <p>You get an online check in option when you book with us.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Fastest on the planet</a></h4>
              <p>Experience a smooth, fast booking experience.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Best security</a></h4>
              <p>Your data is secure with us</p>
            </div>
          </div>

        </div>

      </div>
    </section>

<!-- This part displays the name and roll number of our team members  -->

    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>Meet our team members who have developed this website</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets_welcome_page/img/planes_profile/usericon.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Raghav Magazine</h4>
                <span>Web Developer</span>
                <p>200010042</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="assets_welcome_page/img/planes_profile/usericon.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Siddharth Shankar</h4>
                <span>Web Developer</span>
                <p>200030056</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets_welcome_page/img/planes_profile/usericon.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Tarun Saini</h4>
                <span>Web Developer</span>
                <p>200010051</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>



        </div>

      </div>
    </section>

    <!-- This part is for displaying the plans that our customers can choose (display purpose)  -->

    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Plans for Passengers</h2>
          <p>Choose that plan which fits your lifestyle</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>Free Plan</h3>
              <h4>Rs.0<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> 10% Cancellation charges applicable for any booking</li>
                <li><i class="bx bx-check"></i> Customer Support 24/7</li>
                <li><i class="bx bx-check"></i>Online Check-in facility</li>
                <li class="na"><i class="bx bx-x"></i> <span>Receive priority on Customer Support </span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Zero Cancellation charges</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Silver Plan</h3>
              <h4>Rs.299<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> 10% Cancellation charges applicable for any booking</li>
                <li><i class="bx bx-check"></i> Customer Support 24/7</li>
                <li><i class="bx bx-check"></i>Online Check-in facility</li>
                <li><i class="bx bx-check"></i> <span>Receive priority on Customer Support </span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Zero Cancellation charges</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box featured">
              <h3>Diamond Plan</h3>
              <h4>Rs.999<span>per month</span></h4>
              <ul>
                <li class="na"><i class="bx bx-x"></i> 10% Cancellation charges applicable for any booking</li>
                <li><i class="bx bx-check"></i> Customer Support 24/7</li>
                <li><i class="bx bx-check"></i>Online Check-in facility</li>
                <li><i class="bx bx-check"></i> <span>Receive priority on Customer Support </span></li>
                <li><i class="bx bx-check"></i> <span>Zero Cancellation charges</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- This part dsiplays the FAQ to the users who are new to our website  -->

    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Here you will find some of the frequently asked questions by our passengers.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                data-bs-target="#faq-list-1">What is Airline Management system?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  It's an online platform where you can search and book flights spanning all over the world.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                class="collapsed">What are your terms of use and privacy policy? Where can I read more about it? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Please go to 'About Us' section on the top navigation bar.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                class="collapsed">How do I cancel my ticket on Airline Mgmt system? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Login into your account, then on the passenger dashboard page, select 'Flight status' and then click on 'Cancel Booking' button to cancel your
                  ticket.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4"
                class="collapsed">How do I get a refund on a ticket booking through Airline Mgmt system? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Refunds will be automatically processed from our side within 24 hours of cancelling the ticket with
                  appropriate charges.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"
                class="collapsed">Why is Airline Mgmt system different from other travel booking platforms? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Because it was built to be different from others !
                </p>
              </div>
            </li>

          </ul>
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