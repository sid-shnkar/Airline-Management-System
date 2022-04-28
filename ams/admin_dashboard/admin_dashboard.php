<?php

session_start();
// ** NOTE: Below code checks if the admin is logged in or not. If he/she isn't logged in,
// it redirects the user to admin_login.php 

if (!isset($_SESSION["admin_id"]))
{
   session_unset();
  session_write_close();
  $url = "../admin_login/index.php";
  header("Location: $url");
} 

// ** NOTE: This file is for displaying the admin dashboard . It is accessible only if 
// the admin is logged in through valid credentials. This is checked with the help
// of SESSION variables as shown above.

// It will have features like edit profile, adding a new flight, removing a flight,
// updating etc. displayed in the form of cards to the admin. 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Airline management system</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!--Stylesheet for the fonts displayed on this page -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<!--Stylesheet for the icons and cards that are displayed on this page -->
  <link href="../assets_welcome_page/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets_welcome_page/vendor/line-awsome/line-awesome.min.css" rel="stylesheet">  
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admin_dashboard_sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 
  <link href="../assets_welcome_page/css/style.css" rel="stylesheet">
  <link href="../assets_welcome_page/css/style2.css" rel="stylesheet">

</head>

<body>
   <input type="checkbox" id="nav-toggle"> 
    <div class="sidebar">
        <div class="sidebar-brand">
           <h2>
               <center>
                   <br/>
                <span>Airline Management</span>
                </center>
           </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-home"></span>
                    <span>Dashboard</span></a>
                </li>
		<br>
                <li>
                    <a href="view_edit_profile/edit_profile.php"><span class="las la-user-circle"></span>
                    <span>Edit Profile</span></a>
                </li>
                <br/>
                <li>
                    <a href="../admin_login/admin_logout.php"><span class="las la-sign-out-alt"></span>
                    <span>Sign Out</span></a>
                </li>
            </ul>
        </div>
    </div>
<div class="main-content">
<main>
	 
        <header>
           <h2>
             <label for="nav-toggle">
                 <span class="las la-bars"></span>
             </label>
            Admin Dashboard
            </h2>
        </header>
    
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
		<i class="las la-plane"></i>
		</div>
              <h4><a href="add_new_flight/add_new_flight.php">Add a new flight</a></h4>
              <p>Add a new flight for Passengers and delight them by your services.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="las la-redo"></i><i class="las la-plane"></i></div>
              <h4><a href="update_flight/update_flight.php">Update an existing flight</a></h4>
              <p>Make changes to previously added flights.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="las la-undo"></i><i class="las la-plane"></i></div>
              <h4><a href="view_remove_flight/view_remove_flight.php"> Remove an existing flight</a></h4>
              <p>Permanently remove a scheduled flight.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-redo"></i><i class="bx bx-copy"></i></div>
              <h4><a href="manage_booked_flights/manage_booked_flights.php">Update reservation status</a></h4>
              <p>Make changes to reservation status of booked tickets</p>
            </div>
          </div>

        </div>

<br>
<br>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="las la-eye"></i></div>
              <h4><a href="view_remove_flight/view_remove_flight.php">View all flights</a></h4>
              <p>Have a look on all the flights available.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-book"></i></div>
              <h4><a href="manage_booked_flights/view_booked_flights.php">View Booked flight tickets</a></h4>
              <p>View all the booked flight tickets by the passengers.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="las la-ban"></i></div>
              <h4><a href="view_delete_passenger_record/view_delete_passenger_record.php">Delete a passenger record</a></h4>
              <p>Remove a record of passenger from the system.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
            data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-user"></i></div>
              <h4><a href="view_delete_passenger_record/view_delete_passenger_record.php">View all passenger records</a></h4>
              <p>Passengers who have registered into the system</p>
            </div>
          </div>

        </div>

      </div>
    </section>
</main>
</div>   
  
<!-- Below are some javascripts files required for the animation and display features for this page  -->

  <script src="../assets_welcome_page/vendor/aos/aos.js"></script>
  <script src="../assets_welcome_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets_welcome_page/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets_welcome_page/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets_welcome_page/vendor/php-email-form/validate.js"></script>
  <script src="../assets_welcome_page/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets_welcome_page/vendor/waypoints/noframework.waypoints.js"></script>

  
  <script src="../assets_welcome_page/js/main.js"></script>

</body>

</html>