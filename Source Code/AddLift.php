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
<title>Add A Lift</title>
<LINK REL=ICON HREF="images/icon.png">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<script src="http://maps.google.com/maps/api/js?sensor=true&libraries=places" type="text/javascript"></script>

<script>

function regularLift(e) {

	var i;
	document.getElementById('regular').style.visibility = e.checked && e.id == 'frequency2' ? 'visible' : 'hidden';
	document.getElementById('weekdays').style.visibility = e.checked && e.id == 'frequency2' ? 'visible' : 'hidden';
	
	for( i = 1 ; i <=3 ; i++){
		document.getElementById('regularType'+i).checked = false;
	}
}

function regularType(e) {
		var i;
		document.getElementById('weekdays').style.visibility = 
				e.checked && (e.id == 'regularType2') ? 'visible' : 'hidden';
				
		
		for(i = 1 ; i<=7 ; i++){
			document.getElementById('day'+i).checked = false;
		}
}



</script>

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
					<li><a href="logout.php">Logout</a></li>
					<li><a href="credits.html">Credits</a></li>
<!--					<li><a href="author.php">Author Info</a></li>!-->
			  </ul>
			</div>
		</div>
	<div id="page">
		
			<div class="post">
				<h2 class="title"><a href="#">Welcome To SarSubz Car Pooling System</a></h2>
				<p class="meta"><span class="date">April 03, 2013</span>
				<br/>
				<?php 
					require_once 'status.php';
					require_once 'db.php';
					$username = $_SESSION['username'];
					
				?>
				<br/>
			</div>
			<div id="content">
				<div id="form1">
					<form>
					Once or Regularly:<br/>
					<div id = "once">
					<input id="frequency1" name = "frequency" type = "radio" value = "single" id = "onetime" onchange="regularLift(this)"> Single<br>
					<input id="frequency2" name = "frequency" type = "radio" value = "regular" id = "regulary" onchange="regularLift(this)"> Regular<br>
					</div>
					
					
					<div id = "regular" style = "visibility:hidden">
						
						How Often:
						<br/>
						<input id="regularType1" name = "regular1" type = "radio" value = "daily" onchange="regularType(this)"> Daily </input>
						<input id="regularType2" name = "regular1" type = "radio" value = "weekly" onchange="regularType(this)"> Weekly </input>
						<input id="regularType3" name = "regular1" type = "radio" value = "monthly" onchange="regularType(this)"	> Monthly </input>
							<br/>
							<div id = "weekdays" style="visibility:hidden">
								<input id="day1" name = "days" type = "checkbox" value = "1">Mon</input>
								<input id="day2" name = "days" type = "checkbox" value = "2">Tue</input>
								<input id="day3" name = "days" type = "checkbox" value = "3">Wed</input>
								<input id="day4" name = "days" type = "checkbox" value = "4">Thu</input>
								<input id="day5" name = "days" type = "checkbox" value = "5">Fri</input>
								<input id="day6" name = "days" type = "checkbox" value = "6">Sat</input>
								<input id="day7" name = "days" type = "checkbox" value = "7">Sun</input>
							</div>
						
						<br/>
						
					</div>
				</div>
				
				</form>
				<?php
				
				
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
