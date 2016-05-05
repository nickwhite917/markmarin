<?php
session_start();
include_once '/var/www/html/php/includes/dbconnect.php';
if(isset($_SESSION['user'])!="")
{
	header("Location: /php/user/home.php");
}
if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res);
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: /php/user/home.php");
	}
	else
	{
?>
<script xmlns="http://www.w3.org/1999/html">alert('Username / Password Seems Wrong !');</script>
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
					<legend>Log in</legend>
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input class="form-control" type="text" name="email" placeholder="Your Email" required />
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
							<button class="btn btn-primary" type="submit" name="btn-login">Sign In</button>
							<a href="/php/account/register.php">Sign Up Here</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include('/var/www/html/php/includes/footer.php'); ?>