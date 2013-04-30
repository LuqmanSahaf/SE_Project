
This Page is under Construction.
<?php

	require_once 'status.php';
	require_once 'db.php';
	
	define("SINGLE", '0');
	define("WEEKLY", '1');
	define("ONEWAY", '0');
	define("BOTHWAY", '1');
	define("MALE",'M');
	define("FEMALE",'F');
	define("NOMATTER",'D');
	define("STUDENT",'S');
	define("FACULTY",'F');
	define("PAID",'0');
	define("NOTPAID",'1');
	
	define("LUMS_ADDRESS",'Lahore University of Management Sciences, Lahore, Pakistan');

	
	$username = $_SESSION['username'];
	$user_id = $_SESSION['id'];
	
	if($_POST['frompage'] == "addlift")
	{
		addLift($user_id);
	}
	elseif($_POST['frompage'] == "searchlift"){
		searchLift();
	}
	
	
	
	/****************************************/
	/**--- adds a new lift to database! ---**/
	function addLift($user_id){
		$source;$destination;$frequency;$way;$group;$paid;$gender;$school="";
		$mon='0';$tue='0';$wed='0';$thu='0';$fri='0';$sat='0';$sun='0';$vehicle;$seats;
		$startdate="";$enddate="";$starttime="";$endtime="";$mon_start="";$mon_end="";$tue_start="";$tue_end="";
		$wed_start="";$wed_end="";$thu_start="";$thu_end="";$fri_start="";
		$fri_end="";$sat_start="";$sat_end="";$sun_start="";$sun_end="";
		
		
		if((isset($_POST['frequency']) && isset($_POST['LUMS']) && isset($_POST['start']) && isset($_POST['end'])
		&& isset($_POST['way']) && isset($_POST['gender']) && isset($_POST['group']) && isset($_POST['school']) &&
		isset($_POST['paid']) && isset($_POST['seats']) )){
			echo("add file form seems complete");
			
			$source = $_POST['start'];
			$destination = $_POST['end'];
			
			
			
			if($_POST['way'] == "bothway" ){
				$way = BOTHWAY;
			}else{
				$way = ONEWAY;
			}
			
			
			if( $_POST['frequency'] == "single"){
				if(!isset($_POST['datepicker1']) ){
					echo("The form is not complete 1!");
					return false;
				}
				if($way == BOTHWAY && !(isset($_POST['datepicker2']))){
					echo("<br/>The form is not complete 2!");
					return false;
				}
				$frequency = SINGLE;
				$startdate = $_POST['datepicker1'];
				$enddate = $_POST['datepicker2'];
				$temp_hr = $_POST['start-time-hr'];
				$temp_min = $_POST['start-time-min'];
				$starttime = "$temp_hr:$temp_min";
				$temp_hr = $_POST['back-time-hr'];
				$temp_min = $_POST['back-time-min'];
				$endtime = "$temp_hr:$temp_min";
				
			}else{
				if(!(isset($_POST['datepicker4']) && isset($_POST['datepicker3']))){
					echo("<br/>The form is not complete 3!");
					return false;
				}
				$frequency = WEEKLY;
				$startdate = $_POST['datepicker3'];
				$enddate = $_POST['datepicker4'];
				
				if(isset($_POST['day1'])){
					$mon = '1';
					$temp_hr = $_POST['start-time-hr1'];
					$temp_min = $_POST['start-time-min1'];
					$mon_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST['back-time-hr1'];
					$temp_min = $_POST['back-time-min1'];
					$mon_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day2'])){
					$tue = '1';
					$temp_hr = $_POST['start-time-hr2'];
					$temp_min = $_POST['start-time-min2'];
					$tue_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST['back-time-hr2'];
					$temp_min = $_POST['back-time-min2'];
					$tue_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day3'])){
					$wed = '1';
					$temp_hr = $_POST["start-time-hr3"];
					$temp_min = $_POST["start-time-min3"];
					$wed_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr3"];
					$temp_min = $_POST["back-time-min3"];
					$wed_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day4'])){
					$thu = '1';
					$temp_hr = $_POST["start-time-hr4"];
					$temp_min = $_POST["start-time-min4"];
					$thu_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr4"];
					$temp_min = $_POST["back-time-min4"];
					$thu_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day5'])){
					$fri = '1';
					$temp_hr = $_POST["start-time-hr5"];
					$temp_min = $_POST["start-time-min5"];
					$fri_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr5"];
					$temp_min = $_POST["back-time-min5"];
					$fri_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day6'])){
					$sat = '1';
					$temp_hr = $_POST["start-time-hr6"];
					$temp_min = $_POST["start-time-min6"];
					$sat_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr6"];
					$temp_min = $_POST["back-time-min6"];
					$sat_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day7'])){
					$sun = '1';
					$temp_hr = $_POST["start-time-hr7"];
					$temp_min = $_POST["start-time-min7"];
					$sun_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr7"];
					$temp_min = $_POST["back-time-min7"];
					$sun_end = "$temp_hr:$temp_min";
				}
				
			}
			
			if($_POST['gender'] == "male")
				$gender = MALE;
			elseif($_POST['gender'] == "female")
				$gender = FEMALE;
			else
				$gender = NOMATTER;
				
			if($_POST['group'] == "student")
				$group = STUDENT;
			elseif($_POST['group'] == "faculty")
				$group = FACULTY;
			else
				$group = NOMATTER;
			
			
			$school = $_POST['school'];
			$paid = $_POST['paid'];
			$vehicle = $_POST['vehicle'];
			$seats = $_POST['seats'];
			
			
		}
		else{
			echo("The form is not complete 0!");
			return false;
		}
		
		$query = "insert INTO LIFTS (lift_id,liftprovider,source,destination,frequency,way,
		startdate,enddate,starttime,endtime,mon,tue,wed,thu,fri,sat,sun,mon_start,tue_start,wed_start,thu_start,
		fri_start,sat_start,sun_start,mon_end,tue_end,wed_end,thu_end,fri_end,sat_end,sun_end,gender,liftgroup,
		school,paid,vehicle,freeseats) 
		values(lifts_sequence.nextval,'$user_id','".$source."','".$destination."','$frequency','$way','".$startdate."',
		'".$enddate."','".$starttime."','".$endtime."','$mon','$tue','$wed','$thu','$fri','$sat','$sun',
		'".$mon_start."','".$tue_start."','".$wed_start."','".$thu_start."','".$fri_start."','".$sat_start."','".$sun_start."',
		'".$mon_end."','".$tue_end."','".$wed_end."','".$thu_end."','".$fri_end."','".$sat_end."','".$sun_end."',
		'$gender','$group','$school','$paid','".$vehicle."','$seats') ";
		$result = query($query);
		if(!$result){
			ocirollback();
			return false;
		}
		else{
			return true;
		}
	}
	
	
	/**--- Search A Lift From Database Function! ---**/
	function searchLift(){
	
		$source;$destination;$frequency;$way;$group;$paid;$gender;$school="";
		$mon='0';$tue='0';$wed='0';$thu='0';$fri='0';$sat='0';$sun='0';
		$startdate="";$enddate="";$starttime="";$endtime="";$mon_start="";$mon_end="";$tue_start="";$tue_end="";
		$wed_start="";$wed_end="";$thu_start="";$thu_end="";$fri_start="";
		$fri_end="";$sat_start="";$sat_end="";$sun_start="";$sun_end="";
		
		
		if((isset($_POST['frequency']) && isset($_POST['LUMS']) && isset($_POST['start']) && isset($_POST['end'])
		&& isset($_POST['way']) && isset($_POST['gender']) && isset($_POST['group']) && isset($_POST['school']) &&
		isset($_POST['paid']) )){
			echo("add file form seems complete");
			
			$source = $_POST['start'];
			$destination = $_POST['end'];
			
			
			
			if($_POST['way'] == "bothway" ){
				$way = BOTHWAY;
			}else{
				$way = ONEWAY;
			}
			
			if( $_POST['frequency'] == "single"){
				if(!isset($_POST['datepicker1']) ){
					echo("The form is not complete 1!");
					return false;
				}
				if($way == BOTHWAY && !(isset($_POST['datepicker2']))){
					echo("<br/>The form is not complete 2!");
					return false;
				}
				$frequency = SINGLE;
				$startdate = $_POST['datepicker1'];
				$enddate = $_POST['datepicker2'];
				$temp_hr = $_POST['start-time-hr'];
				$temp_min = $_POST['start-time-min'];
				$starttime = "$temp_hr:$temp_min";
				$temp_hr = $_POST['back-time-hr'];
				$temp_min = $_POST['back-time-min'];
				$endtime = "$temp_hr:$temp_min";
				
			}else{
				if(!(isset($_POST['datepicker4']) && isset($_POST['datepicker3']))){
					echo("<br/>The form is not complete 3!");
					return false;
				}
				$frequency = WEEKLY;
				$startdate = $_POST['datepicker3'];
				$enddate = $_POST['datepicker4'];
				
				if(isset($_POST['day1'])){
					$mon = '1';
					$temp_hr = $_POST['start-time-hr1'];
					$temp_min = $_POST['start-time-min1'];
					$mon_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST['back-time-hr1'];
					$temp_min = $_POST['back-time-min1'];
					$mon_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day2'])){
					$tue = '1';
					$temp_hr = $_POST['start-time-hr2'];
					$temp_min = $_POST['start-time-min2'];
					$tue_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST['back-time-hr2'];
					$temp_min = $_POST['back-time-min2'];
					$tue_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day3'])){
					$wed = '1';
					$temp_hr = $_POST["start-time-hr3"];
					$temp_min = $_POST["start-time-min3"];
					$wed_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr3"];
					$temp_min = $_POST["back-time-min3"];
					$wed_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day4'])){
					$thu = '1';
					$temp_hr = $_POST["start-time-hr4"];
					$temp_min = $_POST["start-time-min4"];
					$thu_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr4"];
					$temp_min = $_POST["back-time-min4"];
					$thu_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day5'])){
					$fri = '1';
					$temp_hr = $_POST["start-time-hr5"];
					$temp_min = $_POST["start-time-min5"];
					$fri_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr5"];
					$temp_min = $_POST["back-time-min5"];
					$fri_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day6'])){
					$sat = '1';
					$temp_hr = $_POST["start-time-hr6"];
					$temp_min = $_POST["start-time-min6"];
					$sat_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr6"];
					$temp_min = $_POST["back-time-min6"];
					$sat_end = "$temp_hr:$temp_min";
				}
				if(isset($_POST['day7'])){
					$sun = '1';
					$temp_hr = $_POST["start-time-hr7"];
					$temp_min = $_POST["start-time-min7"];
					$sun_start = "$temp_hr:$temp_min";
					$temp_hr = $_POST["back-time-hr7"];
					$temp_min = $_POST["back-time-min7"];
					$sun_end = "$temp_hr:$temp_min";
				}
				
			}
			
			if($_POST['gender'] == "male")
				$gender = MALE;
			elseif($_POST['gender'] == "female")
				$gender = FEMALE;
			else
				$gender = NOMATTER;
				
			if($_POST['group'] == "student")
				$group = STUDENT;
			elseif($_POST['group'] == "faculty")
				$group = FACULTY;
			else
				$group = NOMATTER;
				
			$school = $_POST['school'];
			$paid = $_POST['paid'];
			
		}
		else{
			echo("The form is not complete 0!");
			return false;
		}
		
		$q_profile = "select gender,type FROM USERS where user_id = '$user_id' ";
		$r_profile = query($q_profile);
		
		
		if($frequency == SINGLE)
			$query_search = "select * FROM LIFTS where ( (source = '".$source."' and source not like '%".LUMS_ADDRESS."%') or (destination = '".$destination."' and destination not like '%".LUMS_ADDRESS."%') ) and (startdate = '".$startdate."' or  enddate = '".$enddate."') 	";
		else
			$query_search = "select * FROM LIFTS where ( (source = '".$source."' and source not like '%".LUMS_ADDRESS."%') or (destination = '".$destination."' and destination not like '%".LUMS_ADDRESS."%') ) and startdate >= '".$startdate."'  ";
		
		$result_search = query($query_search);
		$scores = array();
		$lifts = array();
		$i=1;
		while(ocifetch($result_search)){
			$lifts[$i] = ociresult($result_search);
			$scores[$i] = 0;
			
			if(){
				
			}
			
			
			$i++;
		}
	}
	
	
	
	function scoreSchool($member_school, $provider,$member){
		if($provider == $member && $provider == $member_school){
			return 15;
		}
		elseif($provider == $member){
			
		}
		else{
			if(){
				
			}
		}
	}
	
	function scorePaid($provider,$member){
		if($provider == '1'){
			if($member == '1'){
				return 10;
			}
			else{
				return -5;
			}
		}
		else{
			if($member == '1'){
				return 10;
			}
			else{
				return 15;
			}
		}
	}
	
	
?>