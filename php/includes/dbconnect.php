<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect("localhost","appUser","markmarin"))
{
	die('There was an error connecting to our database, check out this error message: '.mysql_error());
}
if(!mysql_select_db("myDb"))
{
	die('There was an error selecting a database, check out this error message:'.mysql_error());
}
?>