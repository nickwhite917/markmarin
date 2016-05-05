<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: /php/user/home.php");
}
include '/var/www/html/php/includes/dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
?>
<script>alert('You have been registered!');</script>
<?php
}
else
{
?>
<script>alert('There was an error registering your account. Check your inputs and try again!');</script>
<?php
	}
}
else{
?>
<script>alert('That email is already registered to a user! Try again with a different one!');</script>
<?php
}
}
?>
<?php include('/var/www/html/php/includes/header.php'); ?>
	<div class="row">
		<div class="col-lg-6 well">
			<div id="login-form">
				<form class="form-horizontal" method="post">
					<fieldset>
						<legend>Sign up</legend>
						<div class="form-group">
							<label for="uname" class="col-lg-2 control-label">Desired Username</label>
							<div class="col-lg-10">
								<input class="form-control" type="text" name="uname" placeholder="User Name" required />
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input class="form-control" type="email" name="email" placeholder="Your Email" required />
							</div>
						</div>
						<div class="form-group">
							<label for="pass" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input class="form-control" type="password" name="pass" placeholder="Your Password" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<button class="btn btn-primary" type="submit" name="btn-signup">Sign Up</button>
								<a href="/php/account/login.php">Sign In Here</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<?php include('/var/www/html/php/includes/footer.php'); ?>