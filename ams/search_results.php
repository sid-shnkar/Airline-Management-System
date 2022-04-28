<?php
error_reporting(0);
//session_start();

// ** NOTE: This php file will show the results of the search made by the user in search_flights.php
//  If no flights are available , it displays an error message.

$con = new mysqli("localhost","root","","airline_system");
{

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Search Results | Airline Management System</title>
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



  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets_search_results/css/style.css">


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
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="process_login_signup.php">Book now</a></li>
          <li><a class="nav-link  scrollto active" href="search_flights.php">Search flights</a></li>
          <li><a class="nav-link scrollto" href="https://github.com/Sid-Shankar/SSL_Project" target="_blank">Github</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
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
          <li>Search results</li>
        </ol>
        <h2>Search results </h2>

      </div>
    </section>

    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="color:#15F10A ;font-family: Verdana, Geneva, Tahoma, sans-serif ;font-weight: bold;border-bottom: 1px solid #ff1493;padding-bottom: 10px;">LIST OF AVAILABLE FLIGHTS</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center mb-4">* Please scroll right to see more flight details</h4>
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
                <th>#</th>
                <th>Flight no. </th>
                <th>Flight type </th>
                <th>Airline</th>
                <th>Source</th>
               <th>Desination</th>
               <th >Date of Journey</th>
               <th>Departure time</th>
               <th>Arrival time</th>
              <th>Class</th>
              <th>Meal</th>
              <th>Intermediate Stops</th>
              <th>Flight status</th>
              <th>Amount</th>
              <th>Discount (in %)</th>
              <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>

<?php


$get_source=$_POST["start"];
$get_destination=$_POST["destination"];
$get_doj=$_POST["date"];



$sql=mysqli_query($con,"select * from flights where source= '$get_source' and destination= '$get_destination' and date_of_journey= '$get_doj' ");

if(mysqli_num_rows($sql) > 0)
{

$cnt=1;
while($row=mysqli_fetch_array($sql))
 {
  
?>


<tr>

<td><?php echo $cnt;?></td>
<td><?php echo htmlentities($row['flight_no']);?></td>
<td><?php echo htmlentities($row['type_of_flight']);?></td>
<td><?php echo htmlentities($row['airline']);?></td>
<td><?php echo htmlentities($row['source']);?></td>
<td><?php echo htmlentities($row['destination']);?></td>
<td><?php echo htmlentities($row['date_of_journey']);?></td>
<td><?php echo htmlentities($row['departure_time']);?></td>
<td><?php echo htmlentities($row['arrival_time']);?></td>
<td><?php echo htmlentities($row['type_of_class']);?></td>
<td><?php echo htmlentities($row['meal']);?></td>
<td><?php echo htmlentities($row['intermediate_stops']);?></td>
<td><?php echo htmlentities($row['flight_status']);?></td>                                            
<td><?php echo htmlentities($row['amount']);?></td>
<td><?php echo htmlentities($row['discount']);?></td>
<td>                                  
<a href="process_login_signup.php" onClick="return confirm('Please login/signup first in order to make booking .')">
 <button class="btn btn-danger">Book</button>
</a>
</td>

</tr>
<?php 
$cnt++;
 } 

}
else
{
   echo '<center><h2 style="color:#EE2212 ;"><b>Sorry ! No flights are available as per your search . <h2></b></center><br>' ;

}?>

</tbody>
</table>
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
<?php } ?>