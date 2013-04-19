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
					<li ><a href="/SE">Homepage</a></li>
					<?php
					session_start();
					if(isset($_SESSION['username']) && isset($_SESSION['id'])){
						
					?>
					<li><a href="logout.php">Logout</a></li>
					<?php
					}
					else{
					?>
					<li><a href="loginForm.php">Login</a></li>
					<?php
					}
					?>
					<li><a href="credits.html">Credits</a></li>
<!--					<li><a href="author.php">Author Info</a></li>!-->
			  </ul>
			</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
		<div id="banner">
			<div class="content"><img src="images/img10.jpg" width="1040" height="350" alt="" /></div>
			<div><img src="images/img03.png" width="1000" height="40" alt="" /></div>
		</div>
	</div>
	<!-- end #header -->
  <div id="page">
  <div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Welcome To SarSubz Car Pooling System</a></h2>
				<p class="meta"><span class="date"><?php print(Date("l F d, Y"));?></span></p>
			</div>
		</div>
		<div id="three-columns">
		  <div id="column1">
			<div><img src="images/pro1.jpg" width="240" height="200" alt="" /></div>
				      <p>Muhammad Wajahat		              </p>
				      <p>2014-10-0128</p>
				    </blockquote>
		          </blockquote>
            </blockquote>
		  </div>
		  <div id="column2">
			<div><img src="images/pro2.jpg" width="240" height="200" alt="" /></div>
				    <p>Luqman Ghani</p>
			        <p>	2014-10-0180</p>
				  </blockquote>
            </blockquote>
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
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
