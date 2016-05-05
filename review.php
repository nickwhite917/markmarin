<?php
    session_start();
    include_once 'dbconnect.php';
?>

<?php
if(isset($_SESSION['user'])!="")
{
	$userId = $_SESSION['user'];
    //echo 'userid'.$userId;

    $valid = "SELECT * FROM reviews JOIN users on reviews.user_id = users.user_id where reviews.game_id = $game_id AND users.user_id = $userId";
        $validResult = mysql_query($valid);
        $numRows = mysql_num_rows($validResult);
        echo $numRows;
        if ($numRows > 0){
            $allowedToReview = 0;
        }
        else{
            $allowedToReview = 1;
        }
}
if(isset($_REQUEST['game_id'])!="")
{
    $game_id = $_REQUEST['game_id'];
    //echo 'gameid'.$game_id;
}
if(isset($_REQUEST['title'])!="")
{
    $title = $_REQUEST['title'];
    //echo 'title'.$title;
}
?>

<?php
    if(isset($_POST['submitReview'])) {
        $review = $_POST["review"];
        $review = trim($review);


        $valid = "SELECT COUNT(*) as 'count' FROM reviews JOIN users on reviews.user_id = users.user_id where reviews.game_id = $game_id;";
        $validResult = mysql_query($valid);

        $alt = mysql_result($validResult,0,"count");

        if($alt < 1){
            $query = "INSERT INTO reviews (game_id, review, user_id) VALUES ('$game_id','$review','$userId')";
            $result = mysql_query($query);
        }
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>


<?php include('/var/www/html/php/includes/header.php'); ?>

<?php echo
    '<h1>'.$title.' Reviews</h1>'
    .'<div class="row">'
;?>

<?php
$gamereviews = mysql_query("
	SELECT r.review, u.user_name
    FROM reviews r
    JOIN users u on r.user_id = u.user_id
    JOIN games g on r.game_id = g.id
    WHERE g.id = $game_id
    ;
	");
if (mysql_num_rows($gamereviews) < 1) {
	echo '<h1>'.'No reviews yet.'.'</h1>';
}
else{
	while ($row = mysql_fetch_array($gamereviews, MYSQL_NUM)) {
		echo '
            <div class="col-md-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">User: '.$row[1].'</h3>
                  </div>
                  <div class="panel-body">
                    '.$row[0].'
                  </div>
                </div>
            </div>
		';
	}
}
mysql_free_result($gamereviews);
?>

<?php
if ($userId == ""){
    echo '<div class="row"><div class="col-md-12"><h3>You must be logged in to submit a review.</h3></div></div>';
}
else{
    if ($allowedToReview > 0){
        echo '
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend>Write a review of this game</legend>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Review</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="review"></textarea>
                                <span class="help-block">Enter your review and hit submit.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="submitReview">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="game_id" value="'.$game_id.'" />
                </form>
            </div>
        </div>
        </div>
    ';
    }
    else{
        echo '<div class="row"><div class="col-md-12"><h3>You already reviewed this.</h3></div></div>';
    }

}
?>

<?php include('/var/www/html/php/includes/footer.php'); ?>