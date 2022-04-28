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

// ** NOTE: This php file will display the profile details of the passenger.
// It will allow the passenger to edit his/her profile details.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$mysqli = new mysqli($servername, $username, $password, $dbname);
//session_start();
$passenger_id = $_SESSION['passenger_id'];
$sql = "SELECT * FROM airline_system.passenger_info WHERE passenger_id='$passenger_id'";     
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
    <style>
    img {
    position: absolute;
    top: 300px;
    left: 530px;
    border-radius: 50%;
  }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
    function Alert()
    {
        alert("Data Successfully Updated");
    }
</script>    
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
                <br>
                <li>
                    <a href="" class="active"><span class="las la-user-circle"></span>
                    <span>Profile</span></a>
                </li>
                <br>
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
             Profile
            </h2>
        </header> 
        <div style="background-image: url('img/airplane_1.jpg'); background-size: cover; height:400px; padding-top:70px;" class="img-fluid">
        </div>
        <div class="user">
         <center>
            <div class="profile"> <img id="pic" src="img/profile_picture.jpg"  width="200"> </div>
         </center>
        </div>
        <main>
                <div class="card-single">
                       <center><h2>Personal Details</h2></center>
                      
                </div>
                <div class="card-single">
                    <form action="update_profile.php" method="post" onsubmit="return profileValidation()">
                        <div class="form-group">

                            <label for="exampleInputEmail1"><b>Passenger ID : </b></label>
                            <?php
                            if(isset($rows['passenger_id'])){
                            ?>
                            <b><?php echo $rows['passenger_id'];?></b>
                            <?php
                            }else{
                            ?>
                            <input type="name" class="form-control" name="id" aria-describedby="emailHelp" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Enter passenger Id" required >
                            <?php
                            }
                            ?>
                            </div>

                            <div class="form-group">

                            <label for=""><b><u>Note:</u>  1. Password is stored in hashed format for security purposes. </b></label>
                            <label for=""><b> 2. To change your password, enter new password and click on 'Save Changes' . </b></label>
                            <label for=""><b> 3. If you don't want to change your password, leave the password field empty. </b></label>
                            </div>
    
    
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Name</b><span class="required error" id="name_info"></label>
                            <?php
                            if(isset($rows['pass_name'])){
                            ?>
                            <input type="name" class="form-control" name="name" aria-describedby="emailHelp" pattern="[a-zA-Z][a-zA-Z ]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Enter Name" value="<?php echo $rows['pass_name'];?>" required>
                            <?php
                            }else{
                            ?>
                            <input type="name" class="form-control" name="name" aria-describedby="emailHelp" pattern="[a-zA-Z][a-zA-Z ]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Enter Name" required>
                            <?php
                            }
                            ?>
                            </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><b>Email address</b><span class="required error" id="email_id_info"></label>
                          <?php
                            if(isset($rows['email_id'])){
                          ?>
                          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $rows['email_id'];?>" required>
                          <?php
                            }else{
                            ?>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <?php
                            }
                            ?>
                           </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"><b>Password</b><span class="required error" id="password_info"></label>
                          <?php
                            if(isset($rows['password'])){
                          ?>
                          <input type="name" class="form-control" name="password" placeholder="" value="" >
                          <?php
                            }else{
                            ?>
                          <input type="name" class="form-control" name="password" placeholder="" >
                           <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Passport Number (Max 8 characters accepted)</b><span class="required error" id="passport_number_info"></label>
                            <?php
                            if(isset($rows['passport_no'])){
                            ?>
                            <input type="text" pattern="[a-zA-Z0-9]+"	maxlength="8" title="Passport length should not be greater than 8 aplha-numeric characters." class="form-control" name="passport_number" placeholder="Enter Passport Number" value="<?php echo $rows['passport_no'];?>" required>
                            <?php
                            }else{
                            ?>
                          <input type="text" pattern="[a-zA-Z0-9]+"	maxlength="8" title="Passport length should not be greater than 8 aplha-numeric characters." class="form-control" name="passport_number" placeholder="Enter Passport Number" required> 
                           <?php
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary" >Save Changes</button>
                      </form>
                </div>
        </main>
        
           
    </div>
    
<!-- Below javascript will be validating the form input and check for empty input , if any -->

    <script>
function profileValidation() {
	var valid = true;

	$("#name").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#passport_number").removeClass("error-field");


	var Name = $("#passenger_id").val();
	var Email = $("#email_id").val();
	var Passportno=$("#passport_no").val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;



	if (Name.trim() == "") {
		$("#name_info").html("required.").css("color", "#ee0000").show();
		$("#name").addClass("error-field");
		valid = false;
	}
	if (Passportno.trim() == "") {
		$("#passport_number_info").html("required.").css("color", "#ee0000").show();
		$("#passport_number").addClass("error-field");
		valid = false;
	}
	
	if (Email == "") {
		$("#email_info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (Email.trim() == "") {
		$("#email_info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(Email)) {
		$("#email_info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}

	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}


	
 return valid;
}


</script>

    </body>
    </html>