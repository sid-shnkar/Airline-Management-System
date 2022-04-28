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

// ** NOTE: This php file will display the form containing fields like airline , source, destination
// , meal plan , date of journey etc. to the passenger . Once he/she fills it , it will
// redirect the passenger to payment.php file for payment for the ticket.

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
                    <a href="booking.php"><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>
                <br>
                <li>
                    <a href="" class="active"><span class="las la-ticket-alt"></span>
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
             Book Ticket
            </h2>
        </header>
        <main>
        <div class="card-single">
        <h5>Please fill the form to book you ticket</h5>
        </div>
        <br/>
        <div class="card-single">
        <h5>Flight Details</h5>
        </div>
        <br/>
        <div class="card-single">
        <form action="confirmation.php" method="post" onsubmit="return formValidation()" >
         <div class="form-row">   
        <div class="form-group col-md-6">
         <label for="exampleInputPassword1">Select Airline</label>
         <select name="flight" class="form-control">
         <option value="AirAsia">Air Asia</option>
         <option value="Indigo">Indigo</ption>
         <option value="Vistara">Vistara</option>
         <option value="British_Airways">British Airways</option>
         <option value="Spicejet">Spicejet</option>
         <option value="Emirates">Emirates</option>
         <option value="United">United</option>
         <option value="AirIndia">Air India</option>
         </select>
        </div>
        <div class="form-group col-md-6">
        <label for="exampleInputPassword1">Choose Flight Type</label>
         <select name="flight_type" class="form-control">
         <option value="Domestic">Domestic</option>
         <option value="International">International</option>
        </select>
        </div>
        <div class="form-group col-md-6">
        <label for="exampleInputPassword1">From <span class="required error" id="from_info"></span></label>
        <input type="text" class="form-control" name="start" aria-describedby="emailHelp" placeholder="Enter Starting Location" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required." required>
        </div>
        <div class="form-group col-md-6">
        <label for="exampleInputPassword1">To <span class="required error" id="to_info"></span></label>
        <input type="text" class="form-control" name="destination" aria-describedby="emailHelp" placeholder="Enter Destination" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required." required>
        </div>
        <div class="form-group col-md-6">
        <label for="exampleInputPassword1">Number of People <span class="required error" id="people_info"></span></label>
        <input type="number" class="form-control" name="people" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group col-md-6">
        <label for="exampleInputPassword1">Date of Journey <span class="required error" id="doj_info"></span></label>
        <input type="date" class="form-control" name="date" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group col-md-6">
         <label for="exampleInputPassword1">Select Class</label>
         <select name="class" class="form-control">
         <option value="Economy">Economy</option>
         <option value="Business">Business</option>
         </select>
        </div>
        <div class="form-group col-md-6">
         <label for="exampleInputPassword1">Select Meal Plan</label>
         <select name="meal" class="form-control">
         <option value="Veg">Veg</option>
         <option value="Non-Veg">Non-Veg</option>
         <option value="Veg/Non_Veg">Veg/Non_Veg</option>
         </select>
        </div>
        </div>
        <br/>
        <br/>
        <center><button type="submit" class="btn btn-primary">Confirm Booking and Proceed for Payment</button></center>
        </form>
        </div>

<!-- Below javascript will be validating the form input and check for empty input , if any -->

        <script>
function formValidation() {
	var valid = true;


	$("#start").removeClass("error-field");
	$("#destination").removeClass("error-field");
	

	var Start = $("#start").val();
	var Destination = $("#destination").val();
	

   if(Start.trim() == "")
   {
	     $("#from_info").html("required.").css("color", "#ee0000").show();
		$("#start").addClass("error-field");
		valid = false;
   }

    if(Flightno.trim() == "")
	{
		$("#to_info").html("required.").css("color", "#ee0000").show();
		$("#destination").addClass("error-field");
		valid = false;
	}


	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}


</script>


        </main>
    </div>
</body>
</html>