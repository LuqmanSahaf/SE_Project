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
<title>Profile</title>
<LINK REL=ICON HREF="images/icon.png">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<script>
function displayEdit()
{
document.getElementById("update").style.display='block';
document.getElementById("info").style.display='none';
}

/*
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
*/
</script>

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
	<div id="page">
		
		<div class="post">
			<h2 class="title"><a href="#">Welcome To SarSubz Car Pooling System</a></h2>
			<p class="meta"><span class="date"><?php print(Date("l F d, Y"));?></span>
			<br/>
	
			<br/>
		</div>
		
		<div class="content">
			<div id="info">
				<table class="profile-table">
				<?php

					$result=query("select * from USERS where USERNAME=".$_SESSION['username']);
					while(ocifetch($result)){
						for ($i = 2; $i <= oci_num_fields($result); ++$i) {
							if ($i==3) continue;
							$field=oci_field_name($result, $i);
							echo ("<tr> <td>".$field."</td><td>");
							echo (ociresult($result,$field));
							echo ("</td></tr>");
						}
					}
				?>
				</table>
				<form class="edit-button"> <input type="button" name="edit" value="Edit Profile" onClick="displayEdit()"></form>
			<!--Fetch Data from the database -->
			</div>
			<div id="update">
				<h4>Update profile info:</h4>
				
				<?php $result=query("select * from USERS where USERNAME=".$_SESSION['username']);
					ocifetch($result);?>
				<form class="profile-update" action="update.php" method="POST">
					Full Name:<input type="text" name="fullname" value='<?php print ociresult($result,"NAME");?>'> <br>
					Gender:<input type="radio" name="sex" value="M" checked> Male
						<input type="radio" name="sex" value="F"> Female <br>
					School:<input type="radio" name="school" value="SBASSE" checked> SBASSE
						<input type="radio" name="school" value="SDSB"> SDSB 
						<input type="radio" name="school" value="SHSSL"> SHSSL <br>
					Designation:<input type="radio" name="designation" value="Student" checked> Student
						<input type="radio" name="designation" value="Faculty"> Faculty
						<input type="radio" name="designation" value="Staff"> Staff <br>
					Cell Phone:<input type="text" name="cell" value='<?php echo ociresult($result,"CELL")?>'> <br>
					Email:<input type="text" name="email" value='<?php echo ociresult($result,"EMAIL")?>'> <br>
					<input type="hidden" name="username" value='<?php echo ociresult($result,"USERNAME")?>' >
					<input type="submit" value="Update">
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
