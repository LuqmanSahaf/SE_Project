<?php

Class Control{
	
	array $pages;
	var $_loggedIn;
	var $username;
	var $u_id;
	
	Contol(){
		
		$pages = array(
			"main" => "index.php",
			"home" => "home.php",
			"logout" => "logut.php",
			"login" => "login.php",
			"login form" => "loginForm.php",
			"add a lift" => "addLift.php",
			"check status" => "status.php"
		);
		
		if(isset($_SESSION['username'] && isset($_SESSION['id']))){
			$username = $_SESSION['username'];
			$u_id = $_SESSION['id'];
			$logged_in = "1";
		}
		else{
			$logged_in = "0";
		}
		
	}
	
	
}

?>