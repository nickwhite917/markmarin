<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';
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
<div id="login-form">
	<form method="post">
		<table align="center" width="30%" border="0">
			<tr>
				<td><input type="text" name="uname" placeholder="User Name" required /></td>
			</tr>
			<tr>
				<td><input type="email" name="email" placeholder="Your Email" required /></td>
			</tr>
			<tr>
				<td><input type="password" name="pass" placeholder="Your Password" required /></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
			</tr>
			<tr>
				<td><a href="login.php">Sign In Here</a></td>
			</tr>
		</table>
	</form>
</div>
<?php include('/var/www/html/php/includes/footer.php'); ?>