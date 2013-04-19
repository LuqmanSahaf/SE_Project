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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true&libraries=places" type="text/javascript"></script>

<script type = "text/javascript">


$(document).ready(function () {

  //your code here
	function initialize() {
		
		var mapOptions = {
			center: new google.maps.LatLng(31.470857, 74.40742479999994),
			zoom: 13,
			maxZoom: 15, 
			minZoom: 7,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			streetViewControl: false,
			scrollwheel: false
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);

		var input = document.getElementById('searchTextField');
		var autocomplete = new google.maps.places.Autocomplete(input);

		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map: map
		});

		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			input.className = '';
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				// Inform the user that the place was not found and return.
				input.className = 'notfound';
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(15);
			}
			var image = {
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			};
			marker.setIcon(image);
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}

			infowindow.setContent('<div><input class="button" type="button"value="Confirm Place" id="Confirm" ></input><br/><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	
	
	
	$('#regular, #weekdays,#destination-span, #source-span,#content2,#showmap').hide();
	$("#frequency2").click(function(){
		$("#regular").show(300);
		$("#map-canvas").show(300);
	});
	
	$('#frequency1').click(function(){
		var i;
		$('#weekdays').hide(300);
		$('#regular').hide(300);
		
		for( i = 1 ; i <=3 ; i++){
			document.getElementById('regularType'+i).checked = false;
		}
		for( i = 1 ; i <=7 ; i++){
				document.getElementById('day'+i).checked = false;
		}
	});
	
	
	$("input[name='regular1']").change(function(){
		if($(this).val() == "weekly"){
			$("#weekdays").show(300);
		}
		else{
			$("#weekdays").hide(300);
			var i;
			for( i = 1 ; i <=7 ; i++){
				document.getElementById('day'+i).checked = false;
			}
		}
		$("#searchTextField").show(300);
	});
	
	$("input[name='LUMS']").change(function(){
		if($(this).val() == "source"){
			$("#source-span").hide("slow");
			$("#destination-span").show("slow");
		}
		else{
			
			$("#destination-span").hide("slow");
			$("#source-span").show("slow");
		}
		$("#showmap").show("slow");
		initialize();
	});
	
	$("#step2").click(function(){
		if ($("#frequency1").is(":checked") == false && $("#frequency2").is(":checked") == false){
			alert("Please, complete previous steps first!");
			return;
		}
		else if($("#frequency2").is(":checked") == true && ($("#regularType1").is(":checked") == false && $("#regularType2").is(":checked") == false &&$("#regularType3").is(":checked") == false )){
			alert("Please, complete previous steps first!");
			return;
		}
		else if($("#regularType2").is(":checked") == true && !($("#day1").is(":checked") == true || $("#day2").is(":checked") == true 
			|| $("#day3").is(":checked") == true || $("#day4").is(":checked") == true || $("#day5").is(":checked") == true || $("#day6").is(":checked") == true
			|| $("#day7").is(":checked") == true)){
			alert("Please, complete previous steps first!");
			return;
		}
		goToByScroll("step1");
		$("#content2").slideDown("slow");
		$("#content1").slideUp("slow");
		
		$("#content2").show(300);
	});
	
	function goToByScroll(id){
		jQuery("html,body").animate({scrollTop: jQuery("#"+id).offset().top},"slow");
	}
	
});
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
					<li ><a href="home.php">Home</a></li>
					<li><a href="credits.html">Credits</a></li>
					<li><a href="logout.php">Logout</a></li>
<!--					<li><a href="author.php">Author Info</a></li>!-->
			  </ul>
			</div>
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
				<h5 id = "step1">Step 1: Schedule</h5>
					<div id = "content1">
						Once or Regularly:<br/>
						<div id = "once">
						<input id="frequency1" name = "frequency" type = "radio" value = "single" > Single<br>
						<input id="frequency2" name = "frequency" type = "radio" value = "regular" > Regular<br>
						</div>
						<div id = "regular" >
							How Often:
							<br/>
							<input id="regularType1" name = "regular1" type = "radio" value = "daily"> Daily </input>
							<input id="regularType2" name = "regular1" type = "radio" value = "weekly"> Weekly </input>
							<input id="regularType3" name = "regular1" type = "radio" value = "monthly"> Monthly </input>
							<br/>
							<div id = "weekdays">
								<input id="day1" name = "days" type = "checkbox" value = "1">Mon</input>
								<input id="day2" name = "days" type = "checkbox" value = "2">Tue</input>
								<input id="day3" name = "days" type = "checkbox" value = "3">Wed</input>
								<input id="day4" name = "days" type = "checkbox" value = "4">Thu</input>
								<input id="day5" name = "days" type = "checkbox" value = "5">Fri</input>
								<input id="day6" name = "days" type = "checkbox" value = "6">Sat</input>
								<input id="day7" name = "days" type = "checkbox" value = "7">Sun</input>
							</div>
						</div>
					</div>
					<h5 id = "step2">Step 2: Place And Time</h5>
						<div id="content2">
							<br/>
							<p>According to our policy, LUMS should be either source or destination!<br/>In your trip, LUMS is:</p>
							<input type="radio" name="LUMS" id="LUMS0" value="source"/><label for="LUMS0">Source</label>
							<input type="radio" name="LUMS" id="LUMS1" value="destination"/><label for="LUMS1">Destination</label>
							<br/>
							
							<span id="destination-span">Destination</span>
							<span id="source-span">Source</span>
							
							<div id="showmap">
								<input id="searchTextField" type="text" size="50"/>
								<div id="map-canvas">
								</div>
							</div>
						</div>
						
					</div>
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
