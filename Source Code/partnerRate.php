
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
<title>Ratings</title>
<LINK REL=ICON HREF="images/icon.png">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
<?php 
	require_once 'status.php';
	require_once 'db.php';
	$username = $_SESSION['username'];
					
?>
<div id="wrapper">
  <div id="header-wrapper">
		<div id="header" class="container">
		  <div id="logo">
				<h1>SarSubz LUMS</h1>
			</div>
			<div id="menu">
			  <ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="lifts.php">Manage Lifts</a></li>
					<li><a href="ratings.php">Manage Ratings</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
			  </ul>
			</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	</div>
	<div class="tabs-r">
		<ul>
		<li><a href="hall.php">Hall of Fame</a></li>
		<li><a href="partnerRate.php">Rate Partner</a></li>
		<li><a href="ratings.php">My Ratings</a></li>
		</ul>
	</div>
	<div id="page">
		
		<div class="content">
			<!-- display a List of the lifts that have been completed, allow the user to select one of those,
				a drop down div opens on selection showing names of the trip members, each with a rating bar in front of them.
					user rates each one of them and submits his request. -->
			<form action="ratePartner.php" method="POST">
				Username of Partner: <input type="text" name="user"> 
				Rating: <input type="number" name="rate">
				<input type="hidden"  name="username" value=<?php echo($_SESSION['username']); ?> >
				<input type="submit" value="SUBMIT" >
			</form>
			
			<br class="clear" />
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
