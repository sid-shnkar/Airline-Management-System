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


// ** NOTE: This file will allow the admin to edit his/her profile
// Here we are using namespace AMS (Airline Management System) and the member.php
// file located in the Model folder for updating the admin_info table

use AMS\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->updateMember();
}
$con = new mysqli("localhost","root","","airline_system");
$sql=mysqli_query($con,"select * from admin_info ;");

while($row=mysqli_fetch_array($sql)){
?>



<html>
<head>
<title>Edit profile details </TITLE>
<link href="assets/css/up_style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/update_flight.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>


<style>
        body{ 
            font: 14px sans-serif;
            background-image: url('assets/img/slide3.jpg');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: cover; 
        }
      
		.ams-container button{
	padding: 8px 0px;
	font-size: 1em;
	cursor: pointer;
	border-radius: 3px;
	color: #ffffff;
	font-weight: bold;
	background-color: #037DFF   ;
	border-color: #037DFF  #037DFF   #037DFF   ;
}

.ams-container button {
	background-color: #037DFF   ;
}

 </style>

	</head>
<body>
	<div class="ams-container">
		<div class="sign-up-container">
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Edit your profile</div>
					<p><u><b>Note:</b></u> 1) Password is in hashed format, so not showing it for </p>
					<p>security purposes.</p>
					<br>
					<p>2) New password and Confirm new password fields can be left</p>
					<p> empty if you don't need to change password.</p>
					<br>
					<p>3) Admin ID cannot be changed due to security reasons.</p>
					

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
								New Password<span id="new_password_info"></span>
							</div>
							<input class="input-box-330" type="password" name="new_password"
								id="new_password" >
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm New Password<span 
									id="confirm_new_password_info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm_new_password" id="confirm_new_password" >
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Name<span class="required error" id="name_info"></span>
							</div>
							<input class="input-box-330" type="text" name="name" id="name" value="<?php echo $row['admin_name'];?>" pattern="[a-zA-Z]+" maxlength="50" title="Max 50 alphabets without digits are required.">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email ID<span class="required error"
									id="email_id_info"></span>
							</div>
							<input class="input-box-330" type="email"
								name="email_id" id="email_id" value="<?php echo $row['email_id'];?>">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Contact No.<span class="required error" id="contact_no_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[1-9]{1}[0-9]{9}" title="Please enter 10 digits only."
								name="contact_no" id="contact_no" value="<?php echo $row['contact_no'];?>">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Update details">
					</div>
					<div class="row">
					<p>Go back to dashboard ? <a href="../admin_dashboard.php">Go back</a>.</p>
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


	$("#new_password").removeClass("error-field");
	$("#confirm_new_password").removeClass("error-field");
	$("#email_id").removeClass("error-field");
	$("#contact_no").removeClass("error-field");
	$("#name").removeClass("error-field");
	


	var newPassword = $("#new_password").val();
	var ConfirmnewPassword=$("#confirm_new_password").val();
	var Name=$("#name").val();
	var Emailid = $('#email_id').val();
	var Contactno=$("#contact_no").val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	

	
	if(newPassword != ConfirmnewPassword){
        $("#error-msg").html("Both passwords must be filled and same OR both must be left empty.").show();
        valid=false;
    }
	else if(newPassword.trim() != ConfirmnewPassword.trim())
	{
		$("#error-msg").html("Both passwords must be filled and same OR both must be left empty.").show();
        valid=false;
	}
	if (Emailid == "") {
		$("#email_id_info").html("required").css("color", "#ee0000").show();
		$("#email_id").addClass("error-field");
		valid = false;
	} else if (Emailid.trim() == "") {
		$("#email_id_info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email_id").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(Emailid)) {
		$("#email_id_info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email_id").addClass("error-field");
		valid = false;
	}
	if(Name.trim() == "")
	{
		$("#name_info").html("required.").css("color", "#ee0000").show();
		$("#name").addClass("error-field");
		valid = false;
	}
	if(Contactno.trim() == "")
	{
		$("#contact_no_info").html("required.").css("color", "#ee0000").show();
		$("#contact_no").addClass("error-field");
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
