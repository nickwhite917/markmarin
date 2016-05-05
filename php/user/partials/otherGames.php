
<?php
session_start();
include_once '/var/www/html/php/includes/dbconnect.php';

if(isset($_SESSION['user'])!="")
{
    $userId = $_SESSION['user'];
    $otherGames = "SELECT g.title,
                           g.thumbnail
                    FROM games AS g
                    WHERE NOT EXISTS
                        ( SELECT *
                         FROM reviews
                         JOIN users ON reviews.user_id = users.user_id
                         WHERE users.user_id = $userId
                           AND reviews.game_id = g.id )
    ";

    $result = mysql_query($otherGames);
    $numRows = mysql_num_rows($result);

    if ($numRows == 0) {
        echo '<h4>'.'You reviewed all the games.'.'</h4>';
    }
    else{
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            echo '<div class="media">
            <h3>Games I Can Review</h3>
        ';
            echo '
                <div class="media-left">
                    <a href="'.$row[1].'">
                        <img class="media-object" src="'.$row[1].'" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">'.$row[0].'</h4>
                </div>
            </div>';
        }
    }
    mysql_free_result($gamereviews);
}
else
{
    echo '<div class="row"><div class="col-md-12"><h3>You must be logged in to view other games.</h3></div></div>';
}
?>
