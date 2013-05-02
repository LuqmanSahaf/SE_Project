<?php
	require_once 'db.php';
	$username=$_POST["username"];
	$rateOf=$_POST["user"];
	$rate=$_POST["rate"];
	if ($username!=$rateOf && $rate<=5 && $rate>=0){
		query("insert into RATINGS(USERNAME,RATING,RATED_BY) values(".$rateOf.",".$rate.",".$username.")");
	}
	header("Location: ratings.php");
	exit();
?>