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

// ** NOTE: This file is for deleting the record of a passenger from the passenger_info table. 
// List of all passengers registered in the system are displayed to the admin in form of a table

$con = new mysqli("localhost","root","","airline_system");

{

if(isset($_GET['del']))
      {       
              $pasid=$_GET['id'] ;
              mysqli_query($con,"delete from passenger_info where id = '".$pasid."'");
                  $_SESSION['delmsg']="Message from server: Passenger record successfully deleted from passenger_info table !";

             // ** Note: We are not deleting any flight booked by passenger for this project. 
                 
      }


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | View/Delete Passenger record</title>
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
	width: 1000px;
	margin: 50px auto;
}

body {
    font-family: 'Roboto', sans-serif;
    line-height: 30px;
    background-image: url('assets/img/slide2.jpg');
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
    padding-right: 10px;">List&nbsp; of&nbsp; passenger&nbsp; records</h1>
                    </div>
                </div>
                <div class="row" >
                 
                <font color="purple" align="center">&nbsp; &nbsp; &nbsp;<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
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
                                        <th>Passenger ID</th>
                                        <th>Name </th>
                                        <th>Email ID </th>
                                        <th>Passport no.</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from passenger_info");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


<tr>
<td><?php echo $cnt;?></td>
<td><?php echo htmlentities($row['passenger_id']);?></td>
<td><?php echo htmlentities($row['pass_name']);?></td>
<td><?php echo htmlentities($row['email_id']);?></td>
<td><?php echo htmlentities($row['passport_no']);?></td>
<td>
                                      
<a href="view_delete_passenger_record.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
<button class="btn btn-danger">Delete</button>
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