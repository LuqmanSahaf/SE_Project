<?php
	require_once 'db.php';
	$username=$_POST['username'];
	$name=$_POST['fullname'];
	$cell=$_POST['cell'];
	$email=$_POST['email'];
	$sex=$_POST['sex'];
	$designation=$_POST['designation'];
	$query="update USERS set Name='".$name."', CELL='".$cell."', email='".$email."', gender='".$sex."', type='".$designation."' where username='".$username."'";
	query($query);
	header("Location: profile.php");
	exit();
?>