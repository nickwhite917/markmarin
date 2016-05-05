<?php
session_start();
include '/var/www/html/php/includes/dbconnect.php';
if(isset($_SESSION['user'])!="")
{
    $userId = $_SESSION['user'];
    $query = "SELECT user_name FROM users WHERE user_id = '$userId';";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc ($result);
    $userName = $row['user_name'];
    $text = 'Welcome back '.$userName.'!';
    $loginText = $text;
}
else{
    $loginText = 'Login';
}
echo '
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Very Tiny Game Reviews Site">
    <meta name="author" content="Mark Heller, Marin Condic">

    <title>Heroic Games - A Very Tiny Game Review Site</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://bootswatch.com/superhero/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/site_custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>  
    body {
        padding-top: 50px;
    }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">Heroic Games</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/php/about/about.php">About</a>
                </li>
                <li>
                    <a href="/php/services/services.php">Services</a>
                </li>
                <li>
                    <a href="php/contact/contact.php">Contact us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/php/account/login.php">'.$loginText.'</a></li>
                <li><a href="/php/account/register.php">Register</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
';
