<html>
<body>
<?php
/*status.php*/
session_start();
//Check for valid session. Exit from page if not valid.

if(!isset($_SESSION['username']) && !isset($_SESSION['id'])) {

	header("Location: loginForm.php");
	exit();
}


?>
</body>
</html>