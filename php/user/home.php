<?php
session_start();
include '/var/www/html/php/includes/dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: /index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php include('/var/www/html/php/includes/header.php'); ?>
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to your personal page <?php echo $userRow['user_name'];?></h1>
	</div>
	<div class="col-md-12">
		<?php include('partials/myReviews.php'); ?>
	</div>
	<div class="col-md-12">
		<?php include('partials/otherGames.php'); ?>
	</div>
</div>

<a href="../account/logout.php?logout">Sign Out</a>
<?php include('/var/www/html/php/includes/footer.php'); ?>