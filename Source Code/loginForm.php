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
					<li><a href="loginForm.php">Login</a></li>
					<li><a href="credits.html">Credits</a></li>
<!--					<li><a href="author.php">Author Info</a></li>!-->
			  </ul>
			</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	</div>
		
	<!-- end #header -->
	<div id="page">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Welcome To SarSubz Car Pooling System</a></h2>
				<p class="meta"><span class="date"><?php print(Date("l F d, Y"));?></span></p>
				<?php
					if(isset($_POST["invalid"])){
						echo("<p>The username or password entered is incorrect</p>");
					}
				?>		
				<div class="loginForm"><form action="login.php" method="POST">
					Username <input type="text" name="username"></input> <br>
					Password <input type="password" name="password"></input>
					<input type="submit" name="Login" value="Login"></input>
				</form>
				</div>
			</div>
		</div>
		
	  
		<!-- end #content --><!-- end #sidebar -->
	  <div style="clear: both;">&nbsp;</div>
	</div>
	<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	<!-- end #page --> 
</div>
<div id="footer-content"></div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">
Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
