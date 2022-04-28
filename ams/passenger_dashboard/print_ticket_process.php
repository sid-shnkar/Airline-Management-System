<?php
session_start();
// ** NOTE: Below code checks if the passenger is logged in or not. If he/she isn't logged in,
// it redirects the passenger to passenger_login.php

if (!isset($_SESSION["passenger_id"]))
{
   session_unset();
  session_write_close();
  $url = "../passenger_login_signup/index.php";
  header("Location: $url");
} 
//error_reporting(0);


// ** NOTE: This php file will display the BOARDING PASS containing all the flight details
// of the flight booked by the user along with 'Print now' button to print the page.


$con = new mysqli("localhost","root","","airline_system");


$booked_id=$_SESSION["booked_flight_id"];


//echo $booked_id;

$sql=mysqli_query($con,"SELECT flights.flight_no , booked_flights.passenger_id, booked_flights.pass_name, booked_flights.fare_paid ,booked_flights.reservation_status
, booked_flights.passenger_count, booked_flights.passport_no, booked_flights.airline, flights.type_of_flight, flights.source, flights.destination, flights.intermediate_stops, flights.date_of_journey, flights.departure_time,
flights.arrival_time, flights.type_of_class, flights.meal, flights.amount, flights.discount, flights.flight_status  FROM flights INNER JOIN booked_flights ON flights.flight_no = booked_flights.flight_no
 WHERE booked_flights.id='".$booked_id."' ;");

while($row=mysqli_fetch_array($sql))
{

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Print ticket</title>
  <link rel="stylesheet" href="css/print_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>

.ticket {
  display: inline-block;
  width: 600px;
  margin: 20px;
  background-color: #fff;
  border-radius: 10px;
  color: #fff;
  font-family: Helvetica Neue;
  font-weight: 300;
  letter-spacing: 1px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

    .ticket .place-block .place-value {
  color: #707884;
  font-size: 14px;
  font-weight: 600;
}

.ticket .place {
  padding: 10px;
  text-align: center;
  height: 900px;
}

.ticket.pass .airport .airport-code {
  color: #707884;
  font-weight: 500;
}
  </style>
</head>
<body style="text-align:center;">

<div class="ticket pass">
  <header>
    <div class="company-name">
      &nbsp; BOARDING PASS
    </div>
    
  </header>
  <section class="airports">
    <div class="airport">
      <div class="airport-name">
        SOURCE  &nbsp;&nbsp;  &nbsp;&nbsp;
      </div>
      <div class="airport-code">
      &nbsp;<?php echo $row['source'];?> &nbsp;&nbsp; 
      </div>
    </div>

    
    <div class="airport">
      <div class="airport-name">
        DESTINATION
      </div>
      <div class="airport-code">
      <?php echo $row['destination'];?>
      </div>
    </div>
  </section>

  <div class="place-block" >
      <div class="place-label">
        AIRLINE
      </div>
      <div class="place-value">
      <?php echo $row['airline'];?>
      </div>
    </div>

  <section class="place">
    <div class="place-block" >
      <div class="place-label">
        Departure
      </div>
      <div class="place-value">
      <?php echo $row['departure_time'];?>
      </div>
    </div>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="place-block">
      <div class="place-label">
        Arrival
      </div>
      <div class="place-value">
      <?php echo $row['arrival_time'];?>
      </div>
    </div>

    <section class="place">
    <div class="place-block">
      <div class="place-label">
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Stops
      </div>
      <div class="place-value">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['intermediate_stops'];?>
      </div>
    </div>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="place-block">
        <div class="place-label">
          Departure date
        </div>
        <div class="place-value">
        <?php echo $row['date_of_journey'];?>
        </div>
      </div>

      <section class="place">
      <div class="place-block">
        <div class="place-label">
          Type
        </div>
        <div class="place-value">
        <?php echo $row['type_of_flight'];?>
        </div>
      </div>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="place-block">
        <div class="place-label">
          Class
        </div>
        <div class="place-value">
        <?php echo $row['type_of_class'];?>
        </div>
      </div>

      
      <section class="place">
      <div class="place-block">
        <div class="place-label">
          MEAL
        </div>
        <div class="place-value">
        <?php echo $row['meal'];?>
        </div>
      </div>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="place-block">
        <div class="place-label">
         TOTAL AMOUNT
        </div>
        <div class="place-value">
        Rs. <?php echo $row['fare_paid'];?>
        </div>
      </div>

      <section class="place">
      <div class="place-block">
        <div class="place-label">
          flight status
        </div>
        <div class="place-value">
        <?php echo $row['flight_status'];?>
        </div>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="place-block">
    <div class="place-label">
    &nbsp;&nbsp;&nbsp; Passenger ID
    </div>
    <div class="place-value">
    &nbsp;&nbsp;&nbsp;<?php echo $row['passenger_id'];?>
    </div>
  </div>

  <section class="place">
  <div class="place-block">
    <div class="place-label">
      Booking Name
    </div>
    <div class="place-value">
    <?php echo $row['pass_name'];?>
    </div>
  </div>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="place-block">
    <div class="place-label">
    &nbsp;&nbsp;&nbsp; Passport No.
    </div>
    <div class="place-value">
    &nbsp;&nbsp;&nbsp;  <?php echo $row['passport_no'];?>
    </div>
  </div>

  
  <section class="place">
  <div class="place-block">
    <div class="place-label">
      DISCOUNT (%)
    </div>
    <div class="place-value">
    <?php echo $row['discount'];?>
    </div>
  </div>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="place-block">
    <div class="place-label">
    &nbsp;&nbsp;&nbsp; TRAVELLERS COUNT
    </div>
    <div class="place-value">
    &nbsp;&nbsp;&nbsp;  <?php echo $row['passenger_count'];?>
    </div>
  </div>

  <section class="place">
  <div class="place-block">
    <div class="place-label">
      Reservation Status
    </div>
    <div class="place-value">
    <?php echo $row['reservation_status'];?>
    </div>
  </div>

    <div class="qr">
      <img src="http://www.classtools.net/QR/pics/qr.png" />
    </div>

</section>

<button id="mybutton" type="button" class="btn btn-warning" onClick="window.print()">Print now</button>

<a href="print_ticket.php">
<button id="mybutton" type="button" class="btn btn-primary" >Back to previous page</button>
</a>
<?php

}

?>

</body>
</html>
