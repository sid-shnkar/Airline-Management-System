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

// ** NOTE: After the passenger clicks on the 'search flights' button, more details of the 
// flight matching that search is displayed on this page


$_SESSION['flight']=$_POST['flight'];
$_SESSION['flight_type']=$_POST['flight_type'];
$_SESSION['start']=$_POST['start'];
$_SESSION['destination']=$_POST['destination'];
$_SESSION['date']=$_POST['date'];
$_SESSION['meal']=$_POST['meal'];
$_SESSION['people']=$_POST['people'];
$_SESSION['class']=$_POST['class'];
$flight=$_POST['flight'];
$flight_type=$_POST['flight_type'];
$start=$_POST['start'];
$destination=$_POST['destination'];
$date=$_POST['date'];
$meal=$_POST['meal'];
$people=$_POST['people'];
$class=$_POST['class'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM airline_system.flights WHERE type_of_flight='$flight_type' AND source='$start' AND
        destination='$destination' AND date_of_journey='$date' AND type_of_class='$class' AND airline='$flight' ";
$result = $conn->query($sql);
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
                    <a href="index.php"><span class="las la-home"></span>
                    <span>Dashboard</span></a>
                </li>
                <br/>
                <li>
                    <a href="flights.php"><span class="las la-plane"></span>
                    <span>Airlines Available</span></a>
                </li>
                <br/>
                <li>
                    <a href="" ><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>
                <br>
                <li>
                    <a href="ticket.php" class="active"><span class="las la-ticket-alt"></span>
                    <span>Book Ticket</span></a>
                </li>
                <br/>
                <li>
                    <a href="print_ticket.php" ><span class="las la-clipboard-list"></span>
                    <span>Print Ticket</span></a>
                </li>
                <br/>
                <li>
                    <a href="status.php"><span class="las la-signal"></span>
                    <span>Flight Status</span></a>
                </li>
                <br/>
                <li>
                    <a href="profile.php" ><span class="las la-user-circle"></span>
                    <span>Profile</span></a>
                </li>
                <br/>
                <li>
                    <a href="../passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span>
                    <span>Sign Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
           <h2>
             <label for="nav-toggle">
                 <span class="las la-bars"></span>
             </label>
             Bookings
            </h2>
        </header> 
        
        <main>
        <div class="card-single">
<?php
if($result->num_rows > 0)
{
?>    
                       <center><h2>Flight Details</h2></center>
        </div>
        <div class="card-single">
        <table class="table table-hover">
         <thead>
          <tr>
          <th scope="col">Flight Number</th> 
          <th scope="col">Arrival</th>
          <th scope="col">Departure</th>
          <th scope="col">Intermedite Stops</th>
          </tr>
          </thead>
          <?php 
                while($rows=$result->fetch_assoc())
                {
             ?>
          <tbody>
          <tr>
          <td><?php echo $rows['flight_no'];?></td>
          <td><?php echo $rows['arrival_time'];?></td>
          <td><?php echo $rows['departure_time'];?></td>
          <td><?php echo $rows['intermediate_stops'];?></td>
          </tr>
         </tbody>
         <?php
                }
             ?>
         </table>
        </div>
         <br/>
         <center><button id="mybutton_1" type="button" class="btn btn-primary" >Proceed For Payment</button></center>
         <script type="text/javascript">
         document. getElementById("mybutton_1"). onclick = function () 
         {
         location. href = "payment.php";
         };
         </script>
         <?php
}else{
?>  
<center><h2>Flight Not Available</h2></center>
<button id="mybutton" type="button" class="btn btn-primary" >Back To Booking</button>
<script type="text/javascript">
         document. getElementById("mybutton"). onclick = function () 
         {
         location. href = "ticket.php";
         };
</script>
<?php
}
?>          
</div>
</main> 
</div> 
</body>
</html>