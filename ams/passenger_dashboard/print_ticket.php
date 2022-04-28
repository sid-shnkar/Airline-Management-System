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

// ** NOTE: This php file will display the details of all the booked flights along with an
// option to print the ticket , which will redirect the user to print_ticket_process.php.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$mysqli = new mysqli($servername, $username, $password, $dbname);
//session_start();
$passenger_id = $_SESSION['passenger_id'];
$sql = "SELECT * FROM airline_system.flights
        WHERE airline_system.flights.flight_no
        IN (SELECT flight_no FROM airline_system.booked_flights WHERE passenger_id='$passenger_id')";     
$result = $mysqli->query($sql);



if(isset($_GET['del']))
      {       
              $pasid=$_GET['id'] ;
              
              $_SESSION['booked_flight_id']=$pasid;
              header("location: print_ticket_process.php");
        
               
      }



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
                    <a href="booking.php" ><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>
                <br/>
                <li>
                    <a href="ticket.php" ><span class="las la-ticket-alt"></span>
                    <span>Book Ticket</span></a>
                </li>
                <br/>
                <li>
                    <a href="print_ticket.php" class="active"><span class="las la-clipboard-list"></span>
                    <span>Print Ticket</span></a>
                </li>
                <br/>
                <li>
                    <a href="status.php" ><span class="las la-signal"></span>
                    <span>Flight Status</span></a>
                </li>
                <br>
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
             Print Ticket
           </h2> 
        </header> 
        
        <main>
        <div class="card-single">
                       <center><h2>Print Ticket</h2></center>
        <?php
        if(mysqli_num_rows($result)!=0)
        {
        ?>               
        <?php
        }
        ?>
        </div>
        <div class="card-single">
        <table class="table table-hover">
         <thead>
          <tr>
          <th scope="col">Flight Number</th>
          <th scope="col">Airline</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Date</th>
          <th scope="col">Arrival</th>
          <th scope="col">Departure</th>
          <th scope="col">Status</th>
          <th scope="col">Reservation Status</th>
          <th scope="col">Action</th>
          </tr>
          </thead>
          <?php 
                while($rows=$result->fetch_assoc())
                {
             ?>
          <tbody>
          <tr>
          <td><?php echo $rows['flight_no'];?></td>
          <td><?php echo $rows['airline'];?></td>
          <td><?php echo $rows['source'];?></td>
          <td><?php echo $rows['destination'];?></td>
          <td><?php echo $rows['date_of_journey'];?></td>
          <td><?php echo $rows['arrival_time'];?></td>
          <td><?php echo $rows['departure_time'];?></td>
          <?php
          $flight_number=$rows['flight_no'];
          if($rows['flight_status']=='On-time'){
          ?>
          <td><p style="color:green;"><?php echo $rows['flight_status'];?></p></td>
          <?php
          }else{
          ?>
          <td><p style="color:red;"><?php echo $rows['flight_status'];?></p></td>
          <?php
          }
          ?>
          <?php
          $SQL = "SELECT * FROM airline_system.booked_flights WHERE flight_no='$flight_number'";     
          $Result = $mysqli->query($SQL);
          $Rows=$Result->fetch_assoc()
          ?>
          <?php
          if(isset($Rows['reservation_status'])){
          ?>
          <td><?php echo $Rows['reservation_status'];?></td>
          <?php
          }else{
          ?>
          <td>Will be Updated Soon</td>
          <?php
          }
          ?>

<td>
                                      
              <a href="print_ticket.php?id=<?php echo $Rows['id']?>&del=print" onClick="return confirm('Are you sure you want to print this ticket ?')">
                   <button class="btn btn-warning">Print</button>
               </a>
                  </td>

          </tr>
         </tbody>
         <?php
                }
             ?>
         </table>
        </div>
        </main>
        </div>
    </body>
    </html>