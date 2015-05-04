<?php
$link = $_SERVER['REQUEST_URI'];

$param = parse_url($link, PHP_URL_QUERY);

if ($param == 'logout')
{
	logout();
}

echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Assignment 4</title>
	</head>

	<body>
		<form action="content1.php?lin" method="post">
			Username: <input type="text" name="username"><br>
			<input type="submit" value="Submit"><br>
		</form>
	</body>
</html>';

function logout()
{
 	session_start();
    $_SESSION = array();
    session_destroy();
}
?>