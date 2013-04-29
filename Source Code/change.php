<?php
	require_once 'db.php';
	$rate=$_POST['rating'];
	$username=$_POST['user'];
	$query="update USERS set RATING=".$rate." where USERNAME=".$username;
	query($query);
	header("Location: ratings.php");
	exit();
?>