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

// ** NOTE: This php file will show the payment form to the passenger, where the passenger
// can enter his personal details and payment info like credit card number etc. 
// and make the payment. If the payment is successful, it will redirect to final_ticket.php

$flight=$_SESSION['flight'];
$flight_type=$_SESSION['flight_type'];
$start=$_SESSION['start'];
$destination=$_SESSION['destination'];
$date=$_SESSION['date'];
$meal=$_SESSION['meal'];
$people=$_SESSION['people'];
$class=$_SESSION['class'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM airline_system.flights WHERE type_of_flight='$flight_type' AND source='$start' AND
        destination='$destination' AND date_of_journey='$date' AND type_of_class='$class' AND airline='$flight'";
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
                    <a href="booking.php"><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>
                <br>
                <li>
                    <a href="" class="active"><span class="las la-ticket-alt"></span>
                    <span>Book Ticket</span></a>
                </li>
                <br>
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
                    <a href="passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span>
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
             Payment 
            </h2>
        </header>
        <main>

<div class="card-single">
<?php 
$rows=$result->fetch_assoc();
$cost=$rows['amount']*$people;
$discount=$rows['discount']*($cost/100);
$final_cost=$cost-$discount;

$_SESSION['flight_no'] = $rows['flight_no'];
$_SESSION['fare_paid'] = $final_cost;
$_SESSION['people']=$people ;
$_SESSION['flight']=$flight ;
$_SESSION['meal']=$meal;
?>
    <div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">Total Amount</h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Ticket Cost</h6>
                    </div>
                    &#8360;<?php echo $cost;?>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Discount</h6>
                    </div>
                    &#8360;<?php echo $discount;?>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Total</h6>
                    </div>
                    &#8360;<?php echo $final_cost;?>
                </li>
            </ul> 
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Payment Details</h4>
            <form class="needs-validation" action="confirm_ticket.php" method="post" onsubmit="return formValidation()">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Full Name <span class="required error" id="name_info"></span></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" pattern="[a-zA-Z][a-zA-Z ]+" maxlength="50" title="Max 50 alphabets without digits are required." value="" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Passport Number <span class="required error" id="pass_num_info"></span></label>
                    <input type="text" class="form-control" name="pass_num" pattern="[a-zA-Z0-9]+"	maxlength="8" title="Passport length should not be greater than 8 aplha-numeric characters." placeholder="Eg: D1234567" required>
                </div>
                <div class="mb-3">
                    <label for="username">Email <span class="required error" id="email_info"></span></label>
                    <input type="email" class="form-control" name="email" placeholder="Eg: you@gmail.com" required>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country <span class="required error" id="country_info"></span></label>
                        <input type="text" class="form-control" name="country" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Eg:India" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State <span class="required error" id="state_info"></span></label>
                        <input type="text" class="form-control" name="state" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Eg:Delhi" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">PIN <span class="required error" id="pin_info"></span></label>
                        <input type="number" class="form-control" name="PIN" pattern="[0-9]+" maxlength="6" title="Max 6 digits are required." placeholder="Eg: 110024" required>
                    </div>
                </div>
                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <hr class="mb-4">
                Cards Accepted
                <br/>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Mastercard</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">VISA</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">Discover</label>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card <span class="required error" id="cc-name_info"></span></label>
                        <input type="text" class="form-control" id="cc-name" pattern="[a-zA-Z][a-zA-Z ]+" maxlength="50" title="Max 50 alphabets without digits are required." placeholder="Eg: Harsh Kumar" required>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number<span class="required error" id="cc-number_info"></span></label>
                        <input type="text" class="form-control" id="cc-number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" maxlength="19" title="Please enter in this format: 1234-5678-9876-4321." placeholder="Eg:1234-5673-6254-1604" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration <span class="required error" id="cc-expiration_info"></span></label>
                        <input type="text" class="form-control" id="cc-expiration" pattern="[0-9]{2}/[0-9]{2}" maxlength="5" title="Please enter in this format: MM/YY." placeholder="MM/YY" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV <span class="required error" id="cc-cvv_info"></span></label>
                        <input type="number" class="form-control" id="cc-cvv" pattern="[0-9]+" maxlength="3" title="Max 3 digits are required." placeholder="Eg:123" required>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Make Payment</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Below javascript will be validating the form input and check for empty input , if any -->

<script>
function formValidation() {
	var valid = true;


	$("#name").removeClass("error-field");
	$("#pass_num").removeClass("error-field");
    $("#email").removeClass("error-field");
    $("#country").removeClass("error-field");
    $("#state").removeClass("error-field");
    $("#PIN").removeClass("error-field");
    $("#cc-name").removeClass("error-field");
    $("#cc-number").removeClass("error-field");
    $("#cc-expiration").removeClass("error-field");
    $("#cc-cvv").removeClass("error-field");
    
	

	var Name = $("#name").val();
	var Passnum = $("#pass_num").val();
    var Email = $("#email").val();
    var Country = $("#country").val();
    var State = $("#state").val();
    var Pin = $("#PIN").val();
    var CC_name = $("#cc-name").val();
    var CC_number = $("#cc-number").val();
    var CC_expiration = $("#cc-expiration").val();
    var CC_cvv = $("#cc-cvv").val();
	

   if(Name.trim() == "")
   {
	     $("#name_info").html("required.").css("color", "#ee0000").show();
		$("#name").addClass("error-field");
		valid = false;
   }

    if(Passnum.trim() == "")
	{
		$("#pass_num_info").html("required.").css("color", "#ee0000").show();
		$("#pass_num").addClass("error-field");
		valid = false;
	}

    if(Email.trim() == "")
	{
		$("#email_info").html("required.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	}

    if(Country.trim() == "")
	{
		$("#country_info").html("required.").css("color", "#ee0000").show();
		$("#country").addClass("error-field");
		valid = false;
	}

    if(State.trim() == "")
	{
		$("#state_info").html("required.").css("color", "#ee0000").show();
		$("#state").addClass("error-field");
		valid = false;
	}

    if(Pin.trim() == "")
	{
		$("#pin_info").html("required.").css("color", "#ee0000").show();
		$("#PIN").addClass("error-field");
		valid = false;
	}
    if(CC_name.trim() == "")
	{
		$("#cc-name_info").html("required.").css("color", "#ee0000").show();
		$("#cc-name").addClass("error-field");
		valid = false;
	}

    if(CC_number.trim() == "")
	{
		$("#cc-number_info").html("required.").css("color", "#ee0000").show();
		$("#cc-number").addClass("error-field");
		valid = false;
	}

    if(CC_expiration.trim() == "")
	{
		$("#cc-expiration_info").html("required.").css("color", "#ee0000").show();
		$("#cc-expiration").addClass("error-field");
		valid = false;
	}

    if(CC_cvv.trim() == "")
	{
		$("#cc-cvv_info").html("required.").css("color", "#ee0000").show();
		$("#cc-cvv").addClass("error-field");
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
