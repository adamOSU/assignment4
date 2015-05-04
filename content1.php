<?php
$link = $_SERVER['REQUEST_URI']; //These 6 lines of code keeps people from going directly to the page unless they are logged in and clicked a link to the page
$param = parse_url($link, PHP_URL_QUERY);
if ($param != 'lin')
{
	header("Location: login.php");
}
session_start();

if(session_status() == PHP_SESSION_ACTIVE){
	
	if (isset($_SESSION['username']))
	{
		otherVisit();
	}
	elseif ($_POST['username'] == null)
	{
		echo 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.';
	}
	else
	{
		firstTime();
	}

}

function firstTime()
{
	$_SESSION['visits'] = 0;
	$_SESSION['username'] = $_POST['username'];
	echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before. Click <a href=\"login.php?logout\">here</a> to logout. \n";
	$_SESSION['visits']++;
	echo 'Click <a href="content2.php?lin">here</a> to go to content2.php';
}

function otherVisit()
{
	echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before. Click <a href=\"login.php?logout\">here</a> to logout. \n";
	$_SESSION['visits']++;

	echo 'Click <a href="content2.php?lin">here</a> to go to content2.php';
}
?>