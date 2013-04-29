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
<title>Lifts</title>
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
	<div class="tabs">
		<ul>
		<li><a href="addLift.php">Advertise New</a></li>
		<li><a href="search.php">Search</a></li>
		<li><a href="modifyLift.php">Modify Existing</a></li>
		<li><a href="#">Show All</a></li>
		</ul>
	</div>
	<div id="page">
		
		<div class="post">
			<h2 class="title"><a href="#">Welcome <?php print $_SESSION['username'];?></a></h2>
			<p class="meta"><span class="date"><?php print(Date("l F d, Y"));?></span>
			<br>
			<h4>SARSUBZ LUMS - ABOUT </h4>

				<h5>How we're making LUMS cleaner, greener and more sustainable.</h5>

				<p>At LUMS we believe that universities have a singular role and responsibility in mobilising to face the challenges of environmental stewardship and sustainability. Our goal is to be a leading university, not only in academic excellence but also in social responsibility and environmental stewardship. We seek to instil these values in our students through our intellectual activities and academic curricula, but we must also lead by our own action. There is no better way for a university to influence future generations of students than by the behaviours and decisions that they learn from their own campus experience.</p>

				<p>	The SarSubz LUMS ('SarSubz' is Urdu for 'Always Green') Initiative is an expression of the University's long-standing and continuing commitment to environmental consciousness and sustainable development in our own lives, at our own campus, and beyond. From its very inception, a quarter century ago, the Lahore University of Management Sciences (LUMS), has actively worked to be 'green.' The SarSubz LUMS Initiative is a formalisation of this ongoing quest. More importantly it is an attempt to do systematically what we have been doing instinctively and thereby to express our 'greenness' even better.</p>

				<p>Our goal is continuing improvement and a sustainable and environmental-friendly institution that seeks to minimise its own environmental impact and to improve our collective understanding of the practice and principles of sustainable development. LUMS is dedicated to tackling this challenge both through academic research and teaching and by translating research into action on campus.</p>

				<p>SarSubz LUMS will promote sustainable practices on campus including energy efficiency, waste reduction, improved recycling, reduced water use and more. It will also promote awareness and research activities around environment and sustainability themes around the LUMS campus and encourage greater community activity in these areas. The SarSubz LUMS Initiative will also serve as a platform for tracking and reporting on key environmental use indicators at and around LUMS.</p>

				<p>The initiative will be managed and overseen by a University-wide SarSubz LUMS Committee, headed by the LUMS Vice Chancellor, Dr. Adil Najam. The committee includes representation from all key stakeholders.</p>

				<p>This is a campus-wide campaign working closely with students, staff, faculty and administration officials to create a cleaner, greener and more sustainable LUMS. Join us in this effort, help us in making our campus, our country and our planet a more sustainable and greener home for all.</p>
			<br>
		</div>
		
		<div class="content">
			<div class="info">
				<table>
					<tr> </tr>
				</table>
			<!--Fetch Data from the database -->
			</div>
			<div class="update">
				<form>
					
				</form>
			</div>
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
