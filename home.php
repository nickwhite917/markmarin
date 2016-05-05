<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php include('/var/www/html/php/includes/header.php'); ?>
<p>
<h1>Welcome to your personal page <?php echo $userRow['user_name'];?></h1> 
</p>
<a href="logout.php?logout">Sign Out</a>
<?php include('/var/www/html/php/includes/footer.php'); ?>