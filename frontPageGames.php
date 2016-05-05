<?php
echo '
<div class="row">
	<div class="col-lg-12">
		<h3>Latest Reviews</h3>
	</div>
</div>
<div class="row text-center">
';

include 'dbconnect.php';
$games = mysql_query("SELECT title, thumbnail, description, trailer_link, release_date, id FROM games;");
if (mysql_num_rows($games) < 1) {
	echo '<h1>'.'No games yet.'.'</h1>';
}
else{
	while ($row = mysql_fetch_array($games, MYSQL_NUM)) {
echo '<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">';
		echo '<h3>'.$row[0].'</h3>';
		echo '<img src="'.$row[1].'alt="Game Picture">';
			echo '<div class="caption">';
				echo '<p>'.$row[2].'</p>';
				echo '<p>'.'<a href="'.$row[3].'" class="btn btn-primary" target="_blank">'.'Watch Trailer</a>'
								.'<a href="review.php?game_id='.$row[5].'&title='.$row[0].'"class="btn btn-primary">View Reviews</a>
					</p>';
				echo '<p>'.$row[4].'</p>';
				echo '
					</div>
			</div>
	</div>
	';
	}
}
mysql_free_result($games);

echo '
</div>
';