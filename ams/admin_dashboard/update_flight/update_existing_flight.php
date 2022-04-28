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

// ** NOTE: This file will allow the admin to update any of the selected flight's details
// by showing the existing flight details filled in a form.
// Here we are using namespace AMS (Airline Management System) and the member.php
// file located in the Model folder for updating the flights table

use AMS\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->updateMember();
}
$con = new mysqli("localhost","root","","airline_system");
$sql=mysqli_query($con,"select * from flights where id=".$_SESSION['flight_id'].";");

while($row=mysqli_fetch_array($sql)){
?>



<html>
<head>
<title>Update existing flight </TITLE>
<link href="assets/css/up_style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/update_flight.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>


<style>
        body{ 
            font: 14px sans-serif;
            background-image: url('assets/img/slide2.jpg');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: cover; 
        }
      
 </style>

	</head>
<body>
	<div class="ams-container">
		<div class="sign-up-container">
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Update Existing Flight</div>

				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>
				<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Type of flight<span class="required error" id="type_of_flight_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z]+" maxlength="50" title="Max 50  characters without digits are required."  name="type_of_flight"
								id="type_of_flight" value="<?php echo $row['type_of_flight'];?>" >
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Flight no.<span class="required error" id="flight_no_info"></span>
							</div>
							<input class="input-box-330" type="number" name="flight_no"
								id="flight_no" value="<?php echo $row['flight_no'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Airline<span class="required error" id="airline_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z]+" maxlength="20" title="Max 20  characters without digits are required."  name="airline"
								id="airline" value="<?php echo $row['airline'];?>" >
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Source<span class="required error" id="source_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z]+" maxlength="50" title="Max 50  characters without digits are required."  name="source" id="source" value="<?php echo $row['source'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Destination<span class="required error"
									id="destination_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z]+" maxlength="50" title="Max 50  characters without digits are required."
								name="destination" id="destination" value="<?php echo $row['destination'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Intermediate Stops<span class="required error" id="intermediate_stops_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z0-9/-]+" maxlength="50" title="Max 50 characters with / or - allowed are required."
								name="intermediate_stops" id="intermediate_stops" value="<?php echo $row['intermediate_stops'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Date of journey<span class="required error"
									id="date_of_journey_info"></span>
							</div>
							<input class="input-box-330" type="date"
								name="date_of_journey" id="date_of_journey" value="<?php echo $row['date_of_journey'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Departure time<span class="required error"
									id="departure_time_info"></span>
							</div>
							<input class="input-box-330" type="time"
								name="departure_time" id="departure_time" value="<?php echo $row['departure_time'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Arrival time<span class="required error"
									id="arrival_time_info"></span>
							</div>
							<input class="input-box-330" type="time"
								name="arrival_time" id="arrival_time" value="<?php echo $row['arrival_time'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Type of class<span class="required error"
									id="type_of_class_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z]+" maxlength="50" title="Max 50  characters without digits are required."
								name="type_of_class" id="type_of_class" value="<?php echo $row['type_of_class'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Meal<span class="required error"
									id="meal_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z/-]+" maxlength="50" title="Max 50  characters without digits and / or - allowed are required."
								name="meal" id="meal" value="<?php echo $row['meal'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Amount<span class="required error"
									id="amount_info"></span>
							</div>
							<input class="input-box-330" type="number"
								name="amount" id="amount" value="<?php echo $row['amount'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Discount (in %)<span class="required error"
									id="discount_info"></span>
							</div>
							<input class="input-box-330" type="number"
								name="discount" id="discount" value="<?php echo $row['discount'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Flight status<span class="required error"
									id="flight_status_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z/-]+" maxlength="50" title="Max 50  characters without digits and / or - allowed are required."
								name="flight_status" id="flight_status" value="<?php echo $row['flight_status'];?>">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Update Flight">
					</div>
					<div class="row">
					<p>Go back to previous page? <a href="update_flight.php">Go back</a>.</p>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php
	}
	?>

<!-- Below javascript will be validating the form input and check for empty input , if any -->

	<script>
function signupValidation() {
	var valid = true;


	$("#type_of_flight").removeClass("error-field");
	$("#flight_no").removeClass("error-field");
	$("#airline").removeClass("error-field");
	$("#source").removeClass("error-field");
	$("#destination").removeClass("error-field");
	$("#intermediate_stops").removeClass("error-field");
	$("#date_of_journey").removeClass("error-field");
	$("#departure_time").removeClass("error-field");
	$("#arrival_time").removeClass("error-field");
	$("#type_of_class").removeClass("error-field");
	$("#meal").removeClass("error-field");
	$("#amount").removeClass("error-field");
	$("#discount").removeClass("error-field");
	$("#flight_status").removeClass("error-field");


	var Type_of_flight = $("#type_of_flight").val();
	var Flightno = $("#flight_no").val();
	var Airline =$("#airline").val();
	var Source=$("#source").val();
	var Destination = $('#destination').val();
	var Intermediatestops=$("#intermediate_stops").val();
    var Dateofjourney = $('#date_of_journey').val();
	var Departuretime= $('#departure_time').val()
	var Arrivaltime=$('#arrival_time').val()
	var Typeofclass =$('#type_of_class').val()
	var Meal = $('#meal').val()
	var Amount = $('#amount').val()
	var Discount= $('#discount').val()
	var Flightstatus = $('#flight_status').val()

	

	$("#flight_no_info").html("").hide();


   if(Type_of_flight.trim() == "")
   {
	     $("#type_of_flight_info").html("required.").css("color", "#ee0000").show();
		$("#type_of_flight").addClass("error-field");
		valid = false;
   }

    if(Flightno.trim() == "")
	{
		$("#flight_no_info").html("required.").css("color", "#ee0000").show();
		$("#flight_no").addClass("error-field");
		valid = false;
	}

	if(Airline.trim() == "")
   {
	     $("#airline_info").html("required.").css("color", "#ee0000").show();
		$("#airline").addClass("error-field");
		valid = false;
   }

	if(Source.trim() == "")
	{
		$("#source_info").html("required.").css("color", "#ee0000").show();
		$("#source").addClass("error-field");
		valid = false;
	}

	if(Destination.trim() == "")
	{
		$("#destination_info").html("required.").css("color", "#ee0000").show();
		$("#destination").addClass("error-field");
		valid = false;
	}


	if(Intermediatestops.trim() == "")
	{
		$("#intermediate_stops_info").html("required.").css("color", "#ee0000").show();
		$("#intermediate_stops").addClass("error-field");
		valid = false;
	}

	if(Dateofjourney.trim() == "")
	{
		$("#date_of_journey_info").html("required.").css("color", "#ee0000").show();
		$("#date_of_journey").addClass("error-field");
		valid = false;
	}


	if(Departuretime.trim() == "")
	{
		$("#departure_time_info").html("required.").css("color", "#ee0000").show();
		$("#departure_time").addClass("error-field");
		valid = false;
	}


	if(Arrivaltime.trim() == "")
	{
		$("#arrival_time_info").html("required.").css("color", "#ee0000").show();
		$("#arrival_time").addClass("error-field");
		valid = false;
	}


	if(Typeofclass.trim() == "")
	{
		$("#type_of_class_info").html("required.").css("color", "#ee0000").show();
		$("#type_of_class").addClass("error-field");
		valid = false;
	}

	if(Meal.trim() == "")
	{
		$("#meal_info").html("required.").css("color", "#ee0000").show();
		$("#meal").addClass("error-field");
		valid = false;
	}

	if(Amount.trim() == "")
	{
		$("#amount_info").html("required.").css("color", "#ee0000").show();
		$("#amount").addClass("error-field");
		valid = false;
	}

	if(Discount.trim() == "")
	{
		$("#discount_info").html("required.").css("color", "#ee0000").show();
		$("#discount").addClass("error-field");
		valid = false;
	}

	if(Flightstatus.trim() == "")
	{
		$("#flight_status_info").html("required.").css("color", "#ee0000").show();
		$("#flight_status").addClass("error-field");
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
