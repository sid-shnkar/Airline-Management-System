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

        $start =  $_POST['start'];
        $destination = $_POST['destination'];
        $date =  $_POST['date'];
        $mysqli = new mysqli("localhost","root","","airline_system");
        $sql = "SELECT * FROM airline_system.flights WHERE source='$start' AND destination='$destination' AND date_of_journey='$date'";
        $result = $mysqli->query($sql);

 // ** NOTE: This php file will display the results of the search made by the passenger
 // under the 'search flights' feature. If no flights are available , it will display
 // an error message.      
        
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
                <br>
                <li>
                    <a href="flights.php" class="active"><span class="las la-plane"></span>
                    <span>Airlines Available</span></a>
                </li>
                <br>
                <li>
                    <a href="booking.php"><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>
                <br/>
                <li>
                    <a href="ticket.php"><span class="las la-ticket-alt"></span>
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
                    <a href="profile.php"><span class="las la-user-circle"></span>
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
             Search Flights
            </h2>
        </header> 
        <main>
         <div class="card-single">
<?php
if($result->num_rows > 0)
{
?>                
            <h2>Available Flights</h2>
        </div> 
        <div class="card-single">
        <table class="table table-hover">
         <thead>
          <tr>
          <th scope="col">Flight Number</th>
          <th scope="col">Type of Flight</th>
          <th scope="col">Airline</th>
          <th scope="col">Arrival</th>
          <th scope="col">Departure</th>
          <th scope="col">Type of Class</th>
          <th scope="col">Intermediate Stops</th>
          <th scope="col">Amount (in &#8377;)</th>
          </tr>
          </thead>
          <?php 
                while($rows=$result->fetch_assoc())
                {
             ?>
              <tbody>
          <tr>
          <td><?php echo $rows['flight_no'];?></td>
          <td><?php echo $rows['type_of_flight'];?></td>
          <td><?php echo $rows['airline'];?></td>
          <td><?php echo $rows['arrival_time'];?></td>
          <td><?php echo $rows['departure_time'];?></td>
          <td><?php echo $rows['type_of_class'];?></td>
          <td><?php echo $rows['intermediate_stops'];?></td>
          <td><?php echo $rows['amount'];?></td>
          </tr>
         </tbody>
         <?php
                }
             ?>
         </table>
        </div>
        <?php
}else{
    ?>  
<center><h2>No flights are available as per your search</h2></center>
<button id="mybutton" type="button" class="btn btn-warning" >Back To Search </button>
<script type="text/javascript">
         document. getElementById("mybutton"). onclick = function () 
         {
         location. href = "search.php";
         };
</script>
<?php
}
?>              
        </main>
    </div>  
    </body>
    </html>