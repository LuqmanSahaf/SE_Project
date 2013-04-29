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

<script src="http://maps.google.com/maps/api/js?sensor=true&libraries=places" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type = "text/javascript">


$(document).ready(function () {
	
	var lat_LUMS = 31.470363;
	var lng_LUMS = 74.410915;
  //your code here
	
	
	
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var map;
	var map2;
	var map3;
	var infowindow;
	var location

	function initialize() {
		directionsDisplay = new google.maps.DirectionsRenderer();
		var LUMS = new google.maps.LatLng(lat_LUMS, lng_LUMS);
		var mapOptions = {
			center: LUMS,
			zoom: 13,
			maxZoom: 15, 
			minZoom: 4,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			streetViewControl: false,
			scrollwheel: false
    }
		map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
		directionsDisplay.setMap(map2);
	}
	
	function initialize_place(){
		$ = jQuery;
		var LUMS = new google.maps.LatLng(lat_LUMS, lng_LUMS);
		var mapOptions = {
			center: LUMS,
			zoom: 13,
			maxZoom: 15, 
			minZoom:4,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			streetViewControl: false,
			scrollwheel: false
    }
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		var input = document.getElementById('searchTextField');
		var autocomplete = new google.maps.places.Autocomplete(input);

		autocomplete.bindTo('bounds', map);
		
		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			codeAddress();
		});
		
	}
	
	function codeAddress(){
		var $ = jQuery;
		var componentcount = 0;
		var comps = null;
		var geodata = null;
		
		var LUMS = new google.maps.LatLng(lat_LUMS, lng_LUMS);
		var mapOptions = {
			center: LUMS,
			zoom: 13,
			maxZoom: 15, 
			minZoom: 7,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			streetViewControl: false,
			scrollwheel: false
    }
		map3 = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		var locality, sublocality, postal_code;
		var place = $("#searchTextField").prop("value");
		
		infowindow 	= new google.maps.InfoWindow();
		var geocoder 	= new google.maps.Geocoder();
		geocoder.geocode( { address: place, region: "PK" }, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) 
			{
				map3.setCenter(results[0].geometry.location);
				map3.setZoom(15);
				
				var marker = new google.maps.Marker({
					map: map3,
					position: results[0].geometry.location,
					visible: true,
					draggable: false
				});
			
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map3,marker);
					
				});
								
				location = map3.getCenter();
	
				var formaddr = results[0].formatted_address;
				if($("#LUMS1").is(":checked") == true){
					$("#lat_Destination").val(location.lat());
					$("#lng_Destination").val(location.lng());
					$("#lat_Departure").val(lat_LUMS);
					$("#lng_Departure").val(lng_LUMS);
				}else{
					$("#lat_Destination").val(lat_LUMS);
					$("#lng_Destination").val(lng_LUMS);
					$("#lat_Departure").val(location.lat());
					$("#lng_Departure").val(location.lng());
				}
		
				
				
				var i = 0;
				var j = 0;
				
				var resultcount = results.length;
	
					comps = results[i].address_components;
					geodata = results[i].geometry.location;
					
					componentcount = comps.length;
					
					var postcode = "";
					var route = "";
					var locality = "";
					var sublocality = "";
					var country = "";
					var countrylong = "";
					var foreigncountry = "";
					var neighborhood = "";
					var administrative1 = "";
					var administrative2 = "";
					var administrative3 = "";
					
					for(j = 0; j < componentcount; j++) 
					{
						
						var types = comps[j].types;
						
						if(types[0] == "postal_code"){
							postcode = comps[j].long_name;
						}
	
						if(types[0] == "route"){
							route = comps[j].long_name;
						}
	
						if(types[0] == "locality"){
							locality = comps[j].long_name;
						}
	
						if(types[0] == "sublocality"){
							sublocality = comps[j].long_name;
						}
						
						if(types[0] == "country"){
							country = comps[j].short_name;
						}
						
						if(types[0] == "country"){
							countrylong = comps[j].long_name;
						}
						
						if(types[0] == "neighborhood"){
							neighborhood = comps[j].long_name;
						}
						
						if(types[0] == "administrative_area_level_1"){
							administrative1 = comps[j].long_name;
						}
						
						if(types[0] == "administrative_area_level_2"){
							administrative2 = comps[j].long_name;
						}
						
						if(types[0] == "administrative_area_level_3"){
							administrative3 = comps[j].long_name;
						}
						
					}
	
				var valRes = false; 
								
				if (locality == "" && sublocality == "" && administrative1 == "" && administrative2 == "" && administrative3 == "") {
					alert("Your place was not found! Please try again ");
					$("#confirm-dev").hide("fast");
				
				}
				else
				{
					$("#confirm-dev").show("fast");
					// codePlaceData(0);
					valRes = true;
				}
				
				if(valRes)
				{
					var confirmButton = '<div id="confirm-dev"><button id="confirm" class="button" value="Confirm Place">Confirm Place</button><br/><p1><strong></p1>';
				}
				else var confirmButton = "Your place was not found! Please try again - ";
				
				infowindow.setContent(confirmButton+'<strong id="place-to-confirm">'+formaddr+"</strong>");
				$("#place-entered").val($("#searchTextField").prop("value"));
				infowindow.open(map3, marker);
			}
			else {
				$("#confirm-dev").hide("fast");
				alert("Your place was not found! Please try again ");
			}
	  
		});
		
		
		
	}
	
	function calcRoute() {
		
		$ = jQuery;
		
		
		var start = $("#lat_Departure").val()+","+$("#lng_Departure").val();
		var end = $("#lat_Destination").val()+","+$("#lng_Destination").val();
		
		var waypts = [];
		

		var request = {
				origin: start,
				destination: end,
				// waypoints: waypts,
				optimizeWaypoints: true,
				travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});
		
		
	}
	
	
	
	
	
	/*---------------------------------------------------*/
	
	
	$(document).delegate("#confirm", "click", function() {
		
		if($("#LUMS1").is(":checked") == true){
			$("#start").val("Lahore University of Management Sciences, Lahore, Pakistan");			
			$("#end").val($("#searchTextField").prop("value"));
			$("#confirm-place").html("Destination:   "+$("#end").val());
		}else{
			$("#start").val($("#searchTextField").prop("value"));			
			$("#end").val("Lahore University of Management Sciences, Lahore, Pakistan");
			$("#confirm-place").html("Departure:   "+$("#start").val());
		}
		
		goToByScroll("showmap");
		infowindow.close();
		$("#confirm-dev, #confirm,#showmap").hide("fast");
		$("#show-directions").show("fast");
		$("#map-canvas2").show("fast");
		$("#confirm-place").append("");
		initialize();
		calcRoute();
		
		$("#Date").show("slow");
		$("#Time").show("slow");
		$("#one-both-way").show("slow");
		
		
	});
	
	$(document).delegate("input[name='days']","change",function(){
		var i;
		for(i=1; i< 8; i++){
			if($("#day"+i).is(":checked") == true){
				$("#days-time"+i).show("fast");
			}
			else{
				$("#days-time"+i).hide("fast");
			}
		}
		
	});
	
	
	/*--------------------------------------------------------------*/
	var initialized = false; // map-canvas initialized or not!
	var current_step = 1;
	var startTime = startTimeFor("");
	var backTime = backTimeFor("");
	var k =0;
	var array_days = new Array();
	array_days[0] = "Monday"
	array_days[1] = "Tuesday";
	array_days[2] = "Wednesday";
	array_days[3] = "Thursday";
	array_days[4] = "Friday";
	array_days[5] = "Saturday";
	array_days[6] = "Sunday";
	
	var temp = '<div style="min-width:850px;min-height:20px;" id="head"><span id = "day-for-time'+k+'" class="days" >Day</span><div id="start-time-regular'+k+'" class="start-time">Start Time</div><span id="end-time-regular'+k+'"  class="end-time">End Time</span></div>';
	
	
	for(k=1; k<8; k++){
		temp += '<div style="min-width:850px;min-height:20px;" id="days-time'+k+'"><span id = "day-for-time'+k+'" class="days" >'+array_days[k-1]+'</span><div id="start-time-regular'+k+'" class="start-time">'+startTimeFor(k)+'</div><span id="end-time-regular'+k+'"  class="end-time">'+backTimeFor(k)+'</span></div>';
	}
	
	$("#regular-time").append(temp);
	
	
	$("#start-time").append(startTime);
	$("#end-time").append(backTime);
	for(k=1; k<8; k++){
		$('#days-time'+k).hide("fast");
	}
	$('#destination-span,#weekly,#Date,#label-datepicker2,#label-datepicker1,#start-time,#end-time,#source-span,#selectLUMS,#searchTextField,#showmap,#show-directions,#confirm-menu,#confirm-button,#content1,#content2,#content3,#Date,#Time,#singleLiftTime,#regularLiftTime,#single-time,#regular-time,#datepicker1,#datepicker2,#datepicker3,#datepicker4').hide();
	
	
	goToByScroll("header");
	
	/*--------------------------------------------------------------*/



	
	$("#frequency2").click(function(){
		$("#weekly").show(300);
		$("#map-canvas").show(300);
		$("#map-canvas2").show(300);
		
	});
	
	$('#frequency1').click(function(){
		var i;
		$('#weekly').hide(300);
		
		for( i = 1 ; i <=7 ; i++){
				document.getElementById('day'+i).checked = false;
		}
		
	});
	
	
	
	
	$("input[name='LUMS']").change(function(){
		if($(this).val() == "source"){
			$("#source-span").hide("slow");
			$("#destination-span").show("slow");
		}
		else{
			$("#source-span").show("slow");
			$("#destination-span").hide("slow");
		}
		$("#searchTextField").show("slow");
		$("#showmap").show("slow");
		$("#show-directions").hide("slow");
		if(!initialized){
			$("#selectLUMS").show("slow");
			$("#map-canvas").show(300);
			initialize_place();
			initialized = true;
		}
		$("#searchTextField").focus();
		goToByScroll("showmap");
		
		
	});
	
	
	$("#step1").click(function(){
		goToByScroll("step1");
		$("#content1").slideDown("slow");
		$("#content2").hide("slow");
		$("#content3").hide("slow");
		
		
		current_step = 1;
	});
	
	$("#step2").click(function(){
		if(!checkStep1()){
			alert("Please, complete previous steps first!");
			return;
		}
		goToByScroll("step1");
		$("#content2").slideDown("slow");
		$("#content1").slideUp("slow");
		$("#content3").hide("slow");
		

		current_step = 2;
		
		if($("#frequency1").is(":checked") == true){
			$("#singleLiftTime").show("fast");
			$("#regularLiftTime").hide("fast");
			$("#single-time").show("fast");
			
			$("end-time").hide("fast");
			$("regular-time").hide("fast");
			var i;
			for(i=1; i < 8; i++){
					$("#days-time"+i).hide("fast");
			}
			
		}
		else{
			$("#regularLiftTime").show("fast");
			$("#datepicker3").show("fast");
			$("#datepicker4").show("fast");
			$("#regular-time").show("fast");
			$("#singleLiftTime").hide("fast");
			$("#single-time").hide("fast");
			
			
			for(i=1; i < 8; i++){
				if($("#day"+i).is(":checked") == true)
					$("#days-time"+i).show("fast");
			}
			$("#Time").show("fast");
			$("#Date").show("fast");
		}
		$("#regular-time").hide();
		document.getElementById('oneway').checked = false;
		document.getElementById('bothway').checked = false;
		date_changed = true;
		
	});
	
	$("#step3").click(function(){
		if(!checkStep2()){
			alert("Please, complete previous steps first!");
			return;
		}
		goToByScroll("step1");
		$("#content3").slideDown("slow");
		$("#content2").slideUp("slow");
		$("#content1").hide("slow");
		
		
		current_step = 3;
	});
	
	
	
	$("input[name='paid']").change(function(){
		$("#confirm-div").show("slow");
		$("#confirm-button").show("slow");
	});
	
	
	
	$("#confirm-button").click(function(e){
		e.preventDefault();
		if(!checkStep3()){
			alert("Please, complete previous steps first!");
			return;
		}
		goToByScroll("step3");
		$("#confirm-menu").slideDown("slow");
		$("#content3").slideUp("slow");
		$("#content1").hide("slow");
		$("#content2").hide("slow");
		
	});
	
	$("#confirm-place").click(function(e){
		e.preventDefault();
		$("#searchTextField").show("slow");
		$("#showmap").show("slow");
		$("#show-directions").hide("slow");
		$("#confirm-place").html("");
		if(!initialized){
			$("#selectLUMS").show("slow");
			$("#map-canvas").show(300);
			initialize();
			initialized = true;
		}
	});
	
	$("#send").click(function(e){
		e.preventDefault();
		var i;
		
		if(!(checkStep1() && checkStep2() && checkStep3())){
			alert("Please Complete Previous Steps!");
			return;
		}
		else{
			//TODO
			document.getElementById('info-form').submit();
		}
		
	});
	
	$("#one-both-way").change(function(){
		
		if($("#oneway").is(":checked") == true){
			if($("#frequency1").is(":checked") == true){
				$("#singleLiftTime").show("fast");
				$("#datepicker1").show("fast");
				$("#label-datepicker1").show("fast");
				$("#datepicker2").hide("fast");
				$("#label-datepicker2").hide("fast");
				$("#end-time").hide("fast");
				$("#start-time").show("fast");
			}
			else{
				$("#regularLiftTime").show("fast");
				$("#datepicker3").show("fast");
				$("#datepicker4").show("fast");
				$("#end-time").hide("fast");
				$("#start-time").hide("fast");
				$("#regular-time").show("fast");
				
				var i;
				for(i=1; i < 8; i++){
					$("#end-time-regular"+i).hide("slow");
				}
			}
		}else{
			var i=0;
			
			for(i=1; i < 8; i++){
				if($("#day"+i).is(":checked") == true)
					$("#end-time-regular"+i).show("fast");
			}
			if($("#frequency1").is(":checked") == true){
				$("#singleLiftTime").show("fast");
				$("#label-datepicker1").show("fast");
				$("#datepicker1").show("fast");
				$("#label-datepicker2").show("fast");
				$("#datepicker2").show("fast");
				$("#end-time").show("fast");
				$("#start-time").show("fast");
			}
			else{
				$("#regularLiftTime").show("fast");
				$("#datepicker3").show("fast");
				$("#datepicker4").show("fast");
				$("#end-time").hide("fast");
				$("#start-time").hide("fast");
				$("#regular-time").show("fast");
				
			}
		}
	});
	
	function goToByScroll(id){
		jQuery("html,body").animate({scrollTop: jQuery("#"+id).offset().top},"slow");
	}
	
	/*--- Date Picker Function ---*/
	
	
	$( ".datepicker" ).datepicker({ 
		minDate: 0,
		dateFormat: "dd-mm-yy",
	});
	
	$( ".datepicker2" ).datepicker({ 
		minDate: 0,
		dateFormat: "dd-mm-yy",
	});
	
	var date_changed = false;
	
	$("#datepicker1").focusout(function(){
		if($("#datepicker1").val() != ""){
			$("#datepicker2").datepicker("option","minDate",$("#datepicker1").val());
			date_changed = true;			
		}
	});
	
	$('#datepicker2').click(function(){
		if($("#datepicker1").val() == ""){
			alert("Pick Start Date First!");
			$(".datepicker").datepicker("hide");
			return;
		}
		if(!date_changed){
			$("#datepicker2").datepicker("option","minDate",$("#datepicker1").val());
			date_changed = true;
		}
	});
	$("#datepicker3").change(function(){
		if($("#datepicker3").val() != ""){
			$("#datepicker4").datepicker("option","minDate",$("#datepicker3").val());
			date_changed = true;
		}
	});
	$('#datepicker4').click(function(){
		if($("#datepicker3").val() == ""){
			alert("Pick Start Date First!");
			$(".datepicker2").datepicker("hide");
			return;
		}
		if(!date_changed){
			$("#datepicker4").datepicker("option","minDate",$("#datepicker3").val());
			date_changed = true;
		}
	});
	
	
	/*--- end Date Picker Function---*/
	
	$(document).on("keydown", "#searchTextField", function(e) 
	{
		var code =null;
		code= (e.keyCode ? e.keyCode : e.which);
		if (code == 13) 
		{
			if($("#searchTextField").val() == "")
			{
				alert("Please type in the place!");
				e.preventDefault();
			}
			if($("#searchTextField").val() != "")
			{
				e.preventDefault();
			}
		}
		
	});
	
	/*--- Time Start End Functions ---*/
	
	function startTimeFor(day){
		$ = jQuery;
		var temp = '<span class="'+day+'"><select name="start-time-hr'+day+'" id="start-time-hr'+day+'"><option value=""></option>';
		
		var j;
		for(j = 0; j<24; j++){
			if(j<10){
				temp += '<option value="0'+j+'" >0'+j+'</option>';
			}
			else{
				temp += '<option value="'+j+'" >'+j+'</option>';
			}
		}
		temp+='</select> : <select name="start-time-min'+day+'" id="start-time-min'+day+'"><option value="" ></option><option value="00" >00</option><option value="15" >15</option><option value="30" >30</option><option value="45" >45</option></select></span>';
		return temp;
	}
	
	function backTimeFor(day){
		$ = jQuery;
		var temp ='<span class="'+day+'"><select name="back-time-hr'+day+'" id="back-time-hr'+day+'"><option value=""></option>';
		
		var j;
		for(j = 0; j<24; j++){
			if(j<10){
				temp += '<option value="0'+j+'" >0'+j+'</option>';
			}
			else{
				temp += '<option value="'+j+'" >'+j+'</option>';
			}
		}
		temp+='</select> : <select name="back-time-min'+day+'" id="back-time-min'+day+'"><option value="" ></option><option value="00" >00</option><option value="15" >15</option><option value="30" >30</option><option value="45" >45</option></select></span>';
		return temp;
	}
	
	/*--- end Time Start End Functions ---*/
	
	/*--- Start Step Checking Functions for Form Validation ---*/
	
	function checkStep1(){
		if ($("#frequency1").is(":checked") == false && $("#frequency2").is(":checked") == false){
			return false;
		}
		else if( $("#frequency2").is(":checked")  == true  && !($("#day1").is(":checked") == true || $("#day2").is(":checked") == true 
			|| $("#day3").is(":checked") == true || $("#day4").is(":checked") == true || $("#day5").is(":checked") == true || $("#day6").is(":checked") == true
			|| $("#day7").is(":checked") == true)){
			return false;
		}
		else{
			return true;
		}
	}
	
	function checkStep2(){
		
		if($("input[name='LUMS']").is(":checked") == false){
			$("#place_entered").val("1");
			return false;
		}
		else if($("#confirm-place").html() == ""){
			$("#place_entered").val("2");
			return false;
		}
		else if($("input[name='way']").is(":checked") == false){
			$("#place_entered").val("3");
			return false;
		}
		else if($('#frequency1').is(":checked") == true ){
			if($("#oneway").is(":checked") == true){
				if($("#datepicker1").val() == ""){
					$("#place_entered").val("4");
					return false;
				}
			}
			else{
				if($("#datepicker1").val() == "" || $("#datepicker2").val() == "" ){
					$("#place_entered").val("5");
					return false;
				}
			}
		}
		else if($("#datepicker4").val() == "" || $("#datepicker3").val() == "" ){
			$("#place_entered").val("6");
			return false;
		}
		else{
			$("#place_entered").val("7");
			return true;
		}
		return true;
	}
	
	function checkStep3(){
		if($("input[name='gender']").is(":checked") == false || $("input[name='group']").is(":checked") == false || $("input[name='paid']").is(":checked") == false || $("input[name='school']").is(":checked") == false){
			return false;
		}
		else{
			return true;
		}
	}
	
	
	/*--- end Step Checking Functions for Form Validation ---*/
	
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
		<li><a href="searchlift.php">Search</a></li>
		<li><a href="modifyLift.php">Modify Existing</a></li>
		<li><a href="#">Show All</a></li>
		</ul>
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
				<form id = "info-form" method="POST" action ="Control.php">
				<h5 id = "step1">Step 1: Schedule</h5>
					<div id = "content1" class="step-content">
						Once or Regularly:<br/>
						<div id = "once">
						<input id="frequency1" name = "frequency" type = "radio" value = "single" /><label for="frequency1">Single</label><br>
						<input id="frequency2" name = "frequency" type = "radio" value = "weekly" /><label for="frequency2">weekly</label><br>
						</div>
						<div id = "weekly" >
							<div id = "weekdays">
								<input id="day1" name = "day1" type = "checkbox" value = "Monday"/><label for="day1">Mon</label>
								<input id="day2" name = "day2" type = "checkbox" value = "Tuesday"/><label for="day2">Tue</label>
								<input id="day3" name = "day3" type = "checkbox" value = "Wednesday"/><label for="day3">Wed</label>
								<input id="day4" name = "day4" type = "checkbox" value = "Thursday"/><label for="day4">Thu</label>
								<input id="day5" name = "day5" type = "checkbox" value = "Friday"/><label for="day5">Fri</label>
								<input id="day6" name = "day6" type = "checkbox" value = "Saturday"/><label for="day6">Sat</label>
								<input id="day7" name = "day7" type = "checkbox" value = "Sunday"/><label for="day7">Sun</label>
							</div>
						</div>
					</div>
					<h5 id = "step2">Step 2: Place And Time</h5>
						<div id="content2" class="step-content">
							<br/>
							<p>According to our policy, LUMS should be either source or destination!<br/>In your trip, LUMS is:</p>
							<input type="radio" name="LUMS" id="LUMS1" value="source"/><label for="LUMS1">Source</label>
							<input type="radio" name="LUMS" id="LUMS2" value="destination"/><label for="LUMS2">Destination</label>
							<br/><br/>
							<div id="showmap">
								<span id="selectLUMS">Select</span>
							
								<span id="destination-span">Destination</span>
								<span id="source-span">Source</span>
								<input id="searchTextField" name="searchTextField" type="text" size="50"/>
							
								
								<div id="map-canvas">
								</div>
								
							</div>
							
							<div id="show-directions">
								<button id="confirm-place" class="button"></button>
								<div id="map-canvas2">
								</div>
							</div>
							<br/>
							<div id="Date">
								Your trip is:<br/>
								<div id="one-both-way">
									<input id="oneway" name="way" type="radio"/><label for="oneway">One Way</label>
									<input id="bothway" name="way" type="radio"/><label for="bothway">Both Ways</label>						
								</div>
								<div id="singleLiftTime">
									<div id="start-end-date">
										<label for="datepicker1" id="label-datepicker1">Start Date: </label><input type="text" id="datepicker1" name="datepicker1" class="datepicker" onfocus="this.blur()"/>
										<label for="datepicker2" id="label-datepicker2">End Date: </label><input type="text" id="datepicker2" name="datepicker2" class="datepicker" onfocus="this.blur()"/>
										<br/>
									</div>
								</div>
								<div id="regularLiftTime">
										Period From: <input type="text" id="datepicker3" name="datepicker3" class="datepicker2" onfocus="this.blur()"/>
										Period To: <input type="text" id="datepicker4" name="datepicker4" class="datepicker2" onfocus="this.blur()"/>
										<br/>
								</div>
							</div>
							<div id = "Time">
								<div id="single-time">
									
									<span id="start-time" class="start-time">
									Start Time:
									</span>
									
									<span id="end-time" >
									End Time:
									</span>
								</div>
								<br/>
								<br/>
								<div id="regular-time" style="min-height:100px;">
									
								</div>
							</div>
							
						</div>
					<h5 id="step3">Step 3: Preferences</h5>
						<div id="content3" class="step-content">
						<br/>
						<p>Please state your preferences!</p>
						<br/>
						Would you like the trip to be?<br/>
						<input name="gender" type ="radio" id="gender1" value="male"/><label for="gender1">Male Only</label>
						<input name="gender" type ="radio" id="gender2" value="female"/><label for="gender2">Female Only</label>
						<input name="gender" type ="radio" id="gender3" value="nomatter"/><label for="gender3">Doesn't matter</label>
						<br/><br/>
						What group would you like to choose?<br/>
						<input name="group" type ="radio" id="group1" value="student"/><label for="group1">Student</label>
						<input name="group" type ="radio" id="group2" value="faculty"/><label for="group2">Faculty or Staff</label>
						<input name="group" type ="radio" id="group3" value="nomatter"/><label for="group3">Doesn't matter</label>
						<br/><br/>
						<input name="school" type ="radio" id="school1" value="sse"/><label for="school1">SSE</label>
						<input name="school" type ="radio" id="school2" value="shssl"/><label for="school2">SHSSL</label>
						<input name="school" type ="radio" id="school3" value="sdsb"/><label for="school3">SDSB</label>
						<input name="school" type ="radio" id="school4" value="nomatter"/><label for="school4">Doesn't matter</label>
						<br/><br/>
						Do you want the trip to be paid?<br/>
						<input id="paid1" type="radio" name="paid" value="1"/><label for="paid1">Yes</label>
						<input id="paid2" type="radio" name="paid" value="0"/><label for="paid2">No</label>
						<br/>
						
						</div>
					
					
					<div id="confirm-div">
						<button id="confirm-button" class="button2" text="Confirmation">Confirmation</button>
						<div style ="background-color: #9CCFFF;">
							<div id="confirm-menu">
								
								<br/>
								<button id="send" class="button">SEND</button>
							</div>
						</div>
					</div>
				</p>
				
				
				<div>
					<input type="hidden" name="lat_Destination" id="lat_Destination" value=""/>
					<input type="hidden" name="lng_Destination" id="lng_Destination" value=""/>
					<input type="hidden" name="lat_Departure" id="lat_Departure" value=""/>
					<input type="hidden" name="lng_Departure" id="lng_Departure" value=""/>
					<input type="hidden" name="place_entered" id="place_entered">
					<input type="hidden" name="start" id="start" value=""/>
					<input type="hidden" name="end" id="end" value=""/>
					<input value="searchlift" type="hidden" name="frompage" id="frompage" />
				</div>
				</form>
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
