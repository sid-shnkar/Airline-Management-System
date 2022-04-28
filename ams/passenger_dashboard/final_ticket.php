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

// ** NOTE: This php file shows the Payment Confirmation message to the passenger
// which has all the details entered by the passenger while making the payment.
// Note: Reservation status of every booked ticket is kept as 'Waiting' until the 
// admin confirms it through the admin dashboard.


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$mysqli = new mysqli($servername, $username, $password, $dbname);
//session_start();
$passenger_id=$_SESSION["passenger_id"];
$people=$_SESSION['people'] ;
$flight=$_SESSION['flight'];
$final_ticket_flight_no=$_SESSION['final_ticket_flight_no'];
$booking_name=$_SESSION['name'];
$pass_num=$_SESSION['pass_num'];
$meal=$_SESSION['meal'];
$sql = "SELECT flights.flight_no , booked_flights.passenger_id, booked_flights.pass_name, booked_flights.fare_paid ,booked_flights.reservation_status
, booked_flights.passenger_count, booked_flights.passport_no, booked_flights.airline, flights.type_of_flight, flights.source, flights.destination, flights.intermediate_stops, flights.date_of_journey, flights.departure_time,
flights.arrival_time, flights.type_of_class, flights.meal, flights.amount, flights.discount, flights.flight_status  FROM flights INNER JOIN booked_flights ON flights.flight_no = booked_flights.flight_no
 WHERE booked_flights.flight_no ='".$final_ticket_flight_no."' ;";    
$result = $mysqli->query($sql);
$rows=$result->fetch_assoc()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  perspective: 700px;
  font-family: Roboto-Regular, HelveticaNeue, Arial, sans-serif;
}

.root {
  display: flex;
  align-items: center;
  justify-content: center;
	background: #ededed;
}

.back {
  width: 26px;
  height: 26px;
  position: absolute;
  z-index: 10;
  left: -4px;
  top: 29px;
}

.settings {
  width: 26px;
  height: 26px;
  position: absolute;
  z-index: 10;
  top: 117px;
  right: 0px;
}

.App {
  font-family: sans-serif;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background: #fff;
  box-shadow: 0px 0px 41px -7px rgba(0, 0, 0, 0.15);
  width: 400px;
  height: auto;
	background: #f3f3f3;
}

.headerText {
  color: rgb(34, 34, 34);
  font-weight: bold;
  font-size: 20px;
  width: 340px;
  height: 46px;
  text-align: center;
  margin-top: 30px;
  word-spacing: 2px;
  letter-spacing: 1px;
}

.tripDetail {
  display: flex;
  flex-direction: column;
  text-align: left;
  color: #747474;
  font-size: 10px;
  margin-top: 26px;
  letter-spacing: 2px;
  margin-bottom: 26px;
}

.tripDest {
  color: #141414;
  font-weight: bold;
  font-size: 28px;
  letter-spacing: 1px;
  display: flex;
}

.oneWay {
  font-size: 10px;
  font-weight: 100;
  background: #498eff;
  border: 1px solid #0061ff;
  color: #fff;
  position: relative;
  height: 20px;
  padding: 3px 5px;
  margin-top: 7px;
  border-radius: 3px;
  margin-left: 7px;
}

.headerInput {
  width: 340px;
  height: 40px;
  border: none;
  background: #262626;
  border-radius: 5px;
  border: 1px solid rgb(81, 81, 81);
  padding-top: 8px;
  padding-left: 10px;
  margin-top: 20px;
  margin-bottom: 20px;
}

::placeholder {
  color: #c0c0c0;
  font-size: 20px;
  font-weight: bold;
}

.cardContainer {
  position: relative;
  width: 340px;
  height: 100px;
  /* background: rgb(194, 194, 194); */
  border-radius: 5px;
  transform-origin: bottom;
  margin: 20px;
}

.first {
  width: 340px;
  height: 100px;
  position: absolute;
  border-radius: 5px;
  color: #000;
  transform-origin: bottom;
  transform-style: preserve-3d;
  transition: 0.5s;
  border-radius: 8px;
  display: flex;
  /* backface-visibility: hidden; */
}

.detailDate {
  color: #a09a9a;
  font-size: 9px;
  padding-top: 11px;
}

.detailTime {
  font-weight: bold;
  font-size: 21px;
  color: #000;
}

.detailSub {
  width: 200px;
  height: 100px;
  position: relative;
  border-radius: 0px 8px 8px 0px;
  background: #0a0a0a;
}
.firstDisplay {
  width: 100%;
  height: 100px;
  position: absolute;
  background: #fff;
  border-radius: 8px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 18px 23px;
  flex-wrap: wrap;
  backface-visibility: hidden;
  box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.17);
}

.info {
  position: relative;
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  color: #b2b2b2;
  font-size: 10px;
}

.flightDetail {
  font-size: 23px;
  font-weight: bold;
  color: #3f3f3f;
  flex: 0.5;
  text-align: center;
}

.animContainer {
  padding-left: 0px;
  position: absolute;
  width: 19px;
  height: 10px;
  top: 10px;
  left: 15px;
  overflow: hidden;
}

.anim {
  width: 54px;
  position: absolute;
  display: flex;
  animation: slidein 1s infinite linear;
}

@keyframes slidein {
  to {
    transform: translateX(-18px);
  }

  from {
    transform: translateX(0px);
  }
}

.circle {
  width: 5px;
  height: 5px;
  background: #707070;
  border-radius: 50%;
  margin-right: 13px;
}
.firstTop {
  width: 340px;
  height: 100px;
  position: absolute;
  background: #ffffff;
  backface-visibility: hidden;
  border-radius: 8px;
  border-radius: 8px;
  box-shadow: 0px 0px 3px 0px rgba(132, 132, 132, 0.15);
  display: flex;
  justify-content: space-around;
}

.timecontainer {
  display: flex;
  padding-right: 10px;
  padding-top: 14px;
}

.firstBehind {
  width: 340px;
  height: 100px;
  position: absolute;
  background: #fff;
  transform-origin: center;
  transform: rotate3d(1, 0, 0, -180deg);
  backface-visibility: hidden;
  border-radius: 8px;
  border: 1px dashed #d1d1d1;
  border-left: none;
  border-right: none;
}

.firstBehindDisplay {
  width: 100%;
  height: 100px;
  position: absolute;
  background: #fff;
  border-radius: 8px;
  padding: 12px 23px;
  display: flex;
  justify-content: space-between;
  box-shadow: 0px 11px 25px -1px rgba(0, 0, 0, 0.17);
}

.firstBehindRow {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-top: 7px;
  text-align: left;
}

.detail {
  font-size: 15px;
  color: rgb(69, 69, 69);
  font-weight: bold;
}

.detailLabel {
  color: #686868;
  font-size: 10px;
  font-weight: 100;
}

.second {
  width: 340px;
  height: 50px;
  position: absolute;
  bottom: -2px;
  transform-origin: bottom;
  transform-style: preserve-3d;
  transition: 0.2s;
  border-radius: 8px;
}

.secondTop {
  width: 340px;
  height: 50px;
  position: absolute;
  background: rgb(231, 231, 231);
  backface-visibility: hidden;
  border-radius: 8px;
}

.thirdTop {
  width: 340px;
  height: 50px;
  position: absolute;
  background: rgb(190, 190, 190);
  backface-visibility: hidden;
  border-radius: 8px;
}

.secondBehind {
  width: 340px;
  height: 50px;
  position: absolute;
  background: #fff;
  transform-origin: center;
  transform: rotate3d(1, 0, 0, -180deg);
  backface-visibility: hidden;
  border-radius: 8px;
  border: 1px dashed #d1d1d1;
  border-left: none;
  border-right: none;
}

.secondBehindDisplay {
  width: 100%;
  height: 50px;
  position: absolute;
  background: #fff;
  border-radius: 8px;
  border-bottom: 1px dashed #d1d1d1;
  display: flex;
  justify-content: space-between;
  padding: 10px 23px;
  box-shadow: 0px 11px 25px -1px rgba(0, 0, 0, 0.17);
}

.secondBehindBottom {
  width: 340px;
  height: 50px;
  position: absolute;
  background: #fff;
  transform-origin: center;
  transform: rotate3d(1, 0, 0, -180deg);
  backface-visibility: hidden;
  border-radius: 0px 0px 8px 8px;
  border-radius: 8px;
  box-shadow: 0px 11px 25px -1px rgba(0, 0, 0, 0.17);
}

.third {
  width: 340px;
  height: 50px;
  position: absolute;
  transform-origin: bottom;
  transform-style: preserve-3d;
  transition: 0.2s;
  border-radius: 8px;
}

.button {
  color: #2d2d2d;
  font-size: 19px;
  font-weight: bold;
  padding: 4px 124px;
  border: 1px solid #2d2d2d;
  background: #fff;
  border-radius: 4px;
  margin-top: 9px;
}

.price {
  color: #2d2d2d;
  font-weight: bold;
  font-size: 15px;
  display: flex;
  flex-direction: column;
  margin-top: -2px;
}

.priceLabel {
  color: #747474;
  font-weight: 100;
  font-size: 10px;
  text-align: left;
}

.barCode {
  width: 98px;
  height: 30px;
}
</style>
</head>
<body>
<center><h2>Payment Confirmation</h2></center>
<center>
<div class="cardContainer" style="height: 400px; transition: 0.9s;">
<div class="firstDisplay">
<div class="flightDetail">
<div class="detailLabel" style="font-weight: bold; color: rgb(13, 28, 83);">
From
</div>
<?php echo $rows['source'];?>
</div>

<div class="flightDetail" style="margin-top: 15px;">
<div class="animContainer">
<div class="anim">
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
</div>
</div>
<div class="animContainer" style="left: 62px;">
<div class="anim">
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
</div>
</div>
&#9992;</div>

<div class="flightDetail">
<div class="detailLabel" style="font-weight: bold; color: rgb(13, 28, 83);">To</div>
<?php echo $rows['destination'];?>
</div>
</div>
<div class="first" style="transform: rotate3d(1, 0, 0, -180deg); transition-delay: 0s;">
<div class="firstTop">
<img src="https://beebom.com/wp-content/uploads/2018/12/Lufthansa-Logo.jpg" style="height: 51px; margin: 22px 12px;">

<div class="timecontainer">
<div class="detailDate">
<div class="detailTime">
</div>
</div>
<div class="detailDate">
<div class="detailTime"></div>
</div>
</div>
</div>

<div class="firstBehind">
<div class="firstBehindDisplay">
<div class="firstBehindRow">
<div class="detail">
<?php echo $rows['flight_no'];?>
<div class="detailLabel">Flight Number</div>
</div>
<div class="detail">
<?php echo $rows['type_of_flight'];?>
<div class="detailLabel">Flight Type</div>
</div>
</div>
<div class="firstBehindRow">
<div class="detail">
<?php echo $flight;?>
<div class="detailLabel">Airlines</div>
</div>
<div class="detail"><?php echo $rows['arrival_time'];?>
<div class="detailLabel">Arrival</div>
</div>
</div>
<div class="firstBehindRow">
<div class="detail"><?php echo $rows['date_of_journey'];?>
<div class="detailLabel">Date</div>
</div>
<div class="detail"><?php echo $rows['departure_time'];?>
<div class="detailLabel">Departure</div>
</div>
</div>
</div>
<div class="second" style="transform: rotate3d(1, 0, 0, -180deg); transition-delay: 0.2s;">
<div class="secondTop"></div>
<div class="secondBehind">
<div class="secondBehindDisplay">
<div class="price">&#8377;<?php echo $rows['fare_paid'];?>
<div class="priceLabel">Amount</div>
</div>
<div class="price"><?php echo $rows['type_of_class'];?>
<div class="priceLabel">Class</div>
</div>
<div class="price"><?php echo $people;?></b>
<div class="priceLabel">Number of People</div>
</div>
</div>
<div class="third" style="transform: rotate3d(1, 0, 0, -180deg); transition-delay: 0.4s;">
<div class="thirdTop"></div>

<div class="secondBehind">
<div class="secondBehindDisplay">
<div class="price"><?php echo $meal;?>
<div class="priceLabel">Meal Plan</div>
</div>
<div class="price"><?php echo "Waiting";?>
<div class="priceLabel">Reservation Status</div>
</div>
<div class="price"><?php echo $rows['intermediate_stops'];?></b>
<div class="priceLabel">Intermediate Stops</div>
</div>
</div>

<div class="third" style="transform: rotate3d(1, 0, 0, -180deg); transition-delay: 0.6s;">
<div class="thirdTop"></div>
<div class="secondBehind">
<div class="secondBehindDisplay">
<div class="price"><?php echo $booking_name;?>
<div class="priceLabel">Booking Name</div>
</div>
<div class="price"><?php echo $pass_num;?>
<div class="priceLabel">Passport number</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</center>
<center>
<button id="mybutton"  class="btn btn-primary" >Back To Main Dashboard</button>
<script type="text/javascript">
         document. getElementById("mybutton"). onclick = function () 
         {
         location. href = "index.php";
         };
</script>
</center>
</body>         
</html> 