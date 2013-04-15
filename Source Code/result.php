<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Sovereign 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<LINK REL=ICON HREF="images/icon.png">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
  <div id="header-wrapper">
		<div id="header" class="container">
		  <div id="logo">
				<h1>SarSubz LUMS</h1>
			</div>
			<div id="menu">
			  <ul>
					<li ><a href="index.php">Homepage</a></li>
					<li><a href="login.php">Logout</a></li>
					<li><a href="credits.html">Credits</a></li>
<!--					<li><a href="author.php">Author Info</a></li>!-->
			  </ul>
			</div>
		</div>
		<div id="page">
  <div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Welcome To SarSubz Car Pooling System</a></h2>
				<p class="meta"><span class="date">April 03, 2013</span>
				<br/>
				<?php 
					require_once 'db.php';
					$username = "";
					$password = "";
					if(isset($_POST["username"] ) && isset($_POST["password"])){
						$username = $_POST["username"];
						$password = $_POST["password"];
						
						$q = "select * FROM USERS where USERNAME = '".$username."' and PASSWORD = '".$password."'";
						?><br/><?php
						
						$r = query($q);
						
						if(OCIFETCH($r)){
							
							$email = ociresult($r, "EMAIL");
							$name = ociresult($r,"NAME");
							$gender = ociresult($r,"GENDER");
							$number = ociresult($r,"CELL");
							$type = ociresult($r,"TYPE");
							echo ("Successful Login!");
							?><br/><?php
							echo ( " Your Credentials are: ");
							echo ("<br/>");
							echo ("Name: $name<br/>");
							echo ("Email: $email<br/>");
							echo ("Type: $type<br/>");
							echo ("Number: $number<br/> <br/> <br/>");
						}
						else{
							echo ("Entered username or password is incorrect!");
						} 
					}
					else{
						$error = "Enter Username and Password.";
						echo $error;
					}
	
					?>
					
					</p>
			</div>
		</div>
		
	  
		<!-- end #content --><!-- end #sidebar -->
	  <div style="clear: both;">&nbsp;</div>
  </div>
	<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	</div>
	<!-- end #header -->

	
	<!-- end #page --> 
</div>
<div id="footer-content"></div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
