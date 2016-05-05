<?php
session_start();
include_once 'dbconnect.php';
//if(isset($_SESSION['user'])!="")
//{
//	header("Location: home.php");
//}
if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	//If user is already logged in within this session
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
<!-- Jumbotron Header -->
<header class="jumbotron hero-spacer">
	<h1>A Warm Welcome!</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
	<p><a class="btn btn-primary btn-large">Call to action!</a>
</p>
</header>
<hr>
<!--FRONT PAGE GAMES-->
<?php include('/var/www/html/frontPageGames.php'); ?>
<hr>
<?php include('/var/www/html/php/includes/footer.php'); ?>