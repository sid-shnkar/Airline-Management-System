<?php
use AMS\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}

// ** NOTE: This php file will be validating the SIGNUP details entered by the user
//  For this , it will refer to Member.php file under the Model folder
//  It will also display an option to go back to login page

?>



<html>
<head>
<title>Passenger Registration</TITLE>
<link href="assets/css/style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/passenger_login_signup.css" type="text/css"
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
      
						
.ams-container input[type=submit] {
	padding: 8px 0px;
	font-size: 1em;
	cursor: pointer;
	border-radius: 3px;
	color: #ffffff;
	font-weight: bold;
	background-color: #1a41f3;
	border-color: #1a41f3 #1a41f3 #1a41f3;
}


.ams-container button{
	padding: 8px 0px;
	font-size: 1em;
	cursor: pointer;
	border-radius: 3px;
	color: #ffffff;
	font-weight: bold;
	background-color: #EA401B ;
	border-color: #EA401B  #EA401B  #EA401B ;
}

.ams-container input[type=submit]:hover {
	background-color: #1a41f3;
}

.ams-container button {
	background-color: #EA401B ;
}


 </style>

	</head>
<body>
	<div class="ams-container">
		<div class="sign-up-container">
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Passenger Signup</div>

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
								Passenger ID<span class="required error" id="passenger_id_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z0-9]+" maxlength="50" title="Max 50 alpha-numeric characters are required." name="passenger_id"
								id="passenger_id">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Name<span class="required error" id="pass_name_info"></span>
							</div>
							<input class="input-box-330" type="text" pattern="[a-zA-Z][a-zA-Z ]+" maxlength="50" title="Max 50  characters without digits are required." name="pass_name"
								id="pass_name">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email ID<span class="required error" id="email_id_info"></span>
							</div>
							<input class="input-box-330" type="email" name="email_id" id="email_id">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Passport Number (Max 8 characters)<span class="required error"
									id="passport_no_info"></span>
							</div>
							<input class="input-box-330" type="text"
							pattern="[a-zA-Z0-9]+"	maxlength="8" title="Passport length should not be greater than 8 aplha-numeric characters." name="passport_no" id="passport_no">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="signup-password" id="signup-password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div>
					<div class="row">
					<p>Want to go back to login? <a href="passenger_login.php">Go to Login</a>.</p>
					</div>

				</form>
			</div>
		</div>
	</div>

<!-- Below javascript will be validating the form input and check for empty input , if any -->


	<script>
function signupValidation() {
	var valid = true;

	$("#passenger_id").removeClass("error-field");
	$("#email_id").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#passport_no").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");
	$("#pass_name").removeClass("error-field");

	var UserName = $("#passenger_id").val();
	var email = $("#email_id").val();
	var Passportno=$("#passport_no").val();
	var Password = $('#signup-password').val();
	var Passname=$("#pass_name").val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#passport_info").html("").hide();
	$("#email_id_info").html("").hide();

	if (UserName.trim() == "") {
		$("#passenger_id_info").html("required.").css("color", "#ee0000").show();
		$("#passenger_id").addClass("error-field");
		valid = false;
	}
	if (Passportno.trim() == "") {
		$("#passport_no_info").html("required.").css("color", "#ee0000").show();
		$("#passport_no").addClass("error-field");
		valid = false;
	}
	if (Passname.trim() == "") {
		$("#pass_name_info").html("required.").css("color", "#ee0000").show();
		$("#pass_name").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email_id_info").html("required").css("color", "#ee0000").show();
		$("#email_id").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email_id_info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email_id").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email_id_info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email_id").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
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
