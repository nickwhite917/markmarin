
<?php
session_start();
include_once '/var/www/html/php/includes/dbconnect.php';

if(isset($_SESSION['user'])!="")
{
    $userId = $_SESSION['user'];
    $myReviews = "
      SELECT reviews.review, games.title, games.thumbnail
      FROM reviews 
      JOIN users on reviews.user_id = users.user_id 
      JOIN games on reviews.game_id = games.id 
      WHERE users.user_id = $userId
    ";

    $result = mysql_query($myReviews);
    $numRows = mysql_num_rows($result);

    if ($numRows == 0) {
        echo '<h1>'.'No reviews yet.'.'</h1>';
    }
    else{
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            echo '<div class="media">
            <h3>My Reviews</h3>
        ';
            echo '
                <div class="media-left">
                    <a href="'.$row[2].'">
                        <img class="media-object" src="'.$row[2].'" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">'.$row[1].'</h3>
                    <p class="lead">My Review:</p>
                    <p>'.$row[0].'</p>
                </div>
            </div>';
        }
    }
    mysql_free_result($gamereviews);
}
else
{
    echo '<div class="row"><div class="col-md-12"><h3>You must be logged in to view your reviews.</h3></div></div>';
}
?>
