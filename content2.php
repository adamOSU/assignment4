<?php
$link = $_SERVER['REQUEST_URI'];
$param = parse_url($link, PHP_URL_QUERY);
if ($param != 'lin')
{
	header("Location: login.php");
}

session_start();
echo '<!DOCTYPE html><html>	<head><meta charset="UTF-8"></head><body>';
echo 'Click <a href="content1.php?lin">here</a> to go back to content1.php.';
echo '</body></html>';
?>