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

// ** NOTE: When the passenger successfully books a flight and makes a valid payment, this file
// will insert the new record into the booked_flights.php file

$name=$_POST["name"];
$email=$_POST["email"];
$pass_num=$_POST["pass_num"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";

$conn = new mysqli($servername, $username, $password, $dbname);
//session_start();
$flight_no=$_SESSION['flight_no'] ;
$_SESSION['final_ticket_flight_no']=$flight_no ;
$fair_paid=$_SESSION['fare_paid'] ;
$passenger_id=$_SESSION['passenger_id'];
$flight=$_SESSION['flight'];
$people=$_SESSION['people'];
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['pass_num']=$pass_num;


$sql ="INSERT INTO airline_system.booked_flights (flight_no,airline,passenger_id,pass_name,passport_no,
passenger_count,fare_paid,reservation_status) VALUES ('$flight_no','$flight','$passenger_id','$name','$pass_num',
'$people','$fair_paid','Waiting')";

if ($conn->query($sql) === TRUE) 
{

}
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("location:final_ticket.php");
?>

