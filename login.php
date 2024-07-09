<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<title>CSM Inventory | Login"</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&amp;display=swap" rel="stylesheet">
    <link href="img/csmlogo.png" rel="icon">
    <link href="assets/css/phppot-style.css" type="text/css"rel="stylesheet" />
    <link href="assets/css/user-registration.css" type="text/css"rel="stylesheet" />
    <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	body{
        background-image:url("./assets/login-background.png");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
.sign-up-container{
  background-color: white;
}
.form-label{
color:#e95c15 !important;
}
#login-btn{
	color:white;
	font-weight:bold;
	background: #e95c15;
	width: 80%;
    margin-top: 10px;
    display: inline-block;
    padding: 16px 0px 16px 0px;
    border-radius: 8px;
    background: #e95c15;
    border: none;
    box-shadow: 0px 0px 2px #888888;
    color: white;
    font-size: 14px;
	font-family: 'Roboto', sans-serif;
}
</style>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container"style="box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);
    position: relative;height:480px;
    border-radius: 6px;margin-top: 100px">
			
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
						<img class="csm-image" src="img/csmlogo.png"style="width: 35%;height: auto;margin: 15px;border-radius: 50%;margin-left: 32%">
						<div class="signup-heading"  style="padding-top: 0px;color:#e95c15;font-family: 'Roboto', sans-serif;">CSM INVENTORY</div>
					
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label"style="font-size: 14px">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input style="width:285px"class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label"style="font-size: 14px;">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input style="width:285px"class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="login-btn"
							id="login-btn" value="Login">
					</div>
					<div class="login-signup">
				<a href="user-registration.php" style="color:#e95c15;">Create an Account</a>
			    </div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
