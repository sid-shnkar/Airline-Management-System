<?php

session_start();

// ** NOTE: Below code checks if the admin is logged in or not. If he/she isn't logged in,
// it redirects the user to admin_login.php

if (!isset($_SESSION["admin_id"]))
{
   session_unset();
  session_write_close();
  $url = ".../admin_login/index.php";
  header("Location: $url");
} 


error_reporting(0);

// ** NOTE: This page will list all the flights registered by the admin from flights table
// The admin can then update any of the flight details by clicking on 'Update' button.
// This button will redirect the admin to update_existing_flight.php


$con = new mysqli("localhost","root","","airline_system");

{

if(isset($_GET['upd']))
      {       
              $flightid=$_GET['id'] ;
              $_SESSION['flight_id']=$flightid;

              header("location: update_existing_flight.php");
              //mysqli_query($con,"delete from flights where id = '".$flightid."'");
                  $_SESSION['updmsg']="Message from server: Successfully updated flight details !";

             // ** Note: Booked_flights table will be automatically updated.
                 
      }


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Update flight details</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

    <style>
    .border-box {
	border: 1px solid;
	border-color: #9a9a9a;
	background: #fff;
	border-radius: 4px;
	padding: 10px;
	width: 1200px;
	margin: 50px auto;
}

body {
    font-family: 'Roboto', sans-serif;
    line-height: 30px;
    background-image: url('assets/img/slide3.jpg');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: cover;
    }

</style>

</head>

<body>


    <div class="content-wrapper">
        <div class="container">
            <div class="border-box">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="font-weight: 900;
    padding-bottom: 20px;
    text-align:center;
    text-transform: uppercase;
    border-bottom: 1px solid #e7510c;
    padding-bottom: 3px;
    color: #e7510c;
    font-size: 30px;
    margin-bottom: 40px;
    padding-right: 10px;">Update&nbsp; an&nbsp; existing&nbsp; flight</h1>
                    </div>
                </div>
                <div class="row" >
                 
                <font color="purple" align="center">&nbsp; &nbsp; &nbsp;<?php echo htmlentities($_SESSION['updmsg']);?><?php echo htmlentities($_SESSION['updmsg']="");?></font>
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Wanna go back to dashboard ?
                            <span>
                            <a href="../admin_dashboard.php" >
                                            <button class="btn btn-primary">Go back to dashboard</button>
                              </a>              
                            </span>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Type of flight</th>
                                        <th>Flight no. </th>
                                        <th>Airline</th>
                                        <th>Source </th>
                                        <th>Destination</th>
                                        <th>Intermediate stops</th>
                                        <th>Date of journey</th>
                                        <th>Departure time</th>
                                        <th>Arrival time</th>
                                        <th>Type of class</th>
                                        <th>Meal</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Flight status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from flights");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


<tr>
<td><?php echo $cnt;?></td>
<td><?php echo htmlentities($row['type_of_flight']);?></td>
<td><?php echo htmlentities($row['flight_no']);?></td>
<td><?php echo htmlentities($row['airline']);?></td>
<td><?php echo htmlentities($row['source']);?></td>
<td><?php echo htmlentities($row['destination']);?></td>
<td><?php echo htmlentities($row['intermediate_stops']);?></td>
<td><?php echo htmlentities($row['date_of_journey']);?></td>
<td><?php echo htmlentities($row['departure_time']);?></td>
<td><?php echo htmlentities($row['arrival_time']);?></td>
<td><?php echo htmlentities($row['type_of_class']);?></td>
<td><?php echo htmlentities($row['meal']);?></td>                                     
<td><?php echo htmlentities($row['amount']);?></td>
<td><?php echo htmlentities($row['discount']);?></td>
<td><?php echo htmlentities($row['flight_status']);?></td>
<td>
                                      
<a href="update_flight.php?id=<?php echo $row['id']?>&upd=update" onClick="return confirm('Are you sure you want to update?')">
<button class="btn btn-success">Update</button>
</a>
</td>
                                            
</tr>
<?php 
$cnt++;
} ?>

                                        
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>




            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>