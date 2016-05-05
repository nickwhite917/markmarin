<?php
session_start();
include '/var/www/html/php/includes/dbconnect.php';
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
		header("Location: /php/user/home.php");
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
	<h1>Welcome to <strong>Heroic Games</strong>!</h1>
	<p>Your one stop shop for gaming reviews of only 5 games!</p>
	<p><a class="btn btn-primary btn-large" href="/php/account/register.php">Get in on the action!</a>
</p>
</header>
<hr>
<!--FRONT PAGE GAMES-->
	<div class="row">
		<div class="col-lg-12">
			<h3>Latest Reviews</h3>
		</div>
	</div>
	<div class="row text-center">

<?php
include '/var/www/html/php/includes/dbconnect.php';
$games = mysql_query("SELECT title, thumbnail, description, trailer_link, release_date, id FROM games;");
if (!$games) {
    die('Invalid query: ' . mysql_error());
}
echo mysql_errno($games) . ": " . mysql_error($games). "\n";
if (mysql_num_rows($games) < 1) {
	echo '<h1>'.'No games yet.'.'</h1>';
}
else{
	while ($row = mysql_fetch_array($games, MYSQL_NUM)) {
		echo '<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">';
		echo '<h3>'.$row[0].'</h3>';
		echo '<img src="'.$row[1].'" alt="Game Picture">';
		echo '<div class="caption">';
		echo '<p>'.$row[2].'</p>';
        echo '<a href="/php/reviews/review.php?game_id='.$row[5].'&title='.$row[0].'"class="btn btn-primary">View Reviews</a></p>';
		echo '<p>'.'<a href="'.$row[3].'" class="btn btn-info btn-sm" target="_blank">'.'Watch Trailer</a>';
		echo '<p> <strong>Released:</strong> '.$row[4].'</p>';
		echo '
					</div>
			</div>
	</div>
	';
	}
}
mysql_free_result($games);

echo '</div>';
?>
<?php include('/var/www/html/php/includes/footer.php'); ?>