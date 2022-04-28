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

// ** NOTE: This php file displays the logo of all airlines available along with 'Search Flights' 
// button where the passenger can search for flights.

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
                    <a href="" class="active"><span class="las la-plane"></span>
                    <span>Airlines Available</span></a>
                </li>
                <br>
                <li>
                    <a href="booking.php" ><span class="las la-clipboard-list"></span>
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
             Airlines Available
            </h2>
        </header> 
        <main>
        <div class="card-single">
        <h2>Our Current Partners</h2><button id="myButton" type="button" class="btn btn-primary">Search Flight Details</button>
        <script type="text/javascript">
         document. getElementById("myButton"). onclick = function () 
         {
         location. href = "search.php";
         };
        </script>
        </div>
        <div class="cards">
         <div class="card-single">
                <div>
                    <img src="img/airasia.png" style="width:100%">
                    <br/><br/>
                    <div><center>Air Asia</center></div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/emirates.png" style="width:100%">
                    <br/><br/><br/><br/><br/>
                    <div><center>Emirates</center></div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/indigo.jfif" style="width:100%">
                    <div>
                    <br/><br/><br/><center>Indigo</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/spicejet.png" style="width:100%">
                    <div>
                    <br/><br/><br/><center>Spicejet</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/vistara.png" style="width:100%">
                    <div>
                    <br/><br/><br/><center>Vistara</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/airindia.png" style="width:100%">
                    <div>
                    <br/><br/><center>Air India</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                <img src="img/united.png" style="width:100%">
                    <div>
                    <br/><br/><br/><br/><br/><center>United</center>
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                <img src="img/britishairways.png" style="width:100%">
                    <div>
                    <br/><br/><br/><br/><br/><center>British Airways</center>
                    </div>
                </div>
             </div>
            </div>
        </main>  
        </div>  
    </body>
    </html>