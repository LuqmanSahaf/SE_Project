<html>
<head>
<title>
Logging in
</title>
</head>

<body>


<?php
require_once("db.php");
function check_login($username, $password)
{
	if (!($username && $password))
		return false;

	$result = query("select * FROM USERS where USERNAME = '".$username."' and PASSWORD = '".$password."'");
	
	
	if(ocifetch($result)){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = ociresult($result,"ID");
	
		return true;
	}
	else{
		return false;
	}
	
}
//error_reporting(0);
if(check_login($_POST["username"], $_POST["password"])){
	
	header("Location: home.php");
	exit();
}
else{
?>
<form id = "f" action = "loginForm.php" method = "POST" >
<input name = "invalid" value = "1" type = "hidden">
</form>
<script type="text/javascript">
	window.onload = function () {
  document.getElementById('f').submit();
	}
</script>

<?php

}

?>


</body>
</html>