<?php
session_start();
include_once 'dbconnect.php';
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
?>
<script>alert('Username / Password Seems Wrong !');</script>
<?php
	}
	
}
?>
<?php include('/var/www/html/php/includes/header.php'); ?>
<div class="row">
	<div id="login-form">
		<form method="post">
			<table align="center" width="30%" border="0">
				<tr>
					<td><input type="text" name="email" placeholder="Your Email" required /></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="Your Password" required /></td>
				</tr>
				<tr>
					<td><button type="submit" name="btn-login">Sign In</button></td>
				</tr>
				<tr>
					<td><a href="register.php">Sign Up Here</a></td>
				</tr>
			</table>
		</form>
	</div>
	
</div>
<?php include('/var/www/html/php/includes/footer.php'); ?>