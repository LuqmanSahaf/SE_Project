<?php
 


$dbhost = 'localhost';
$dbuser = 'se';
$dbpass = 'se';
 

$conn =   oci_connect($dbuser, $dbpass,
'(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1522))
(CONNECT_DATA=(SERVER=DEDICATED)
(SERVICE_NAME = orcl)))');





function query($q) {
  global $conn;
  $result = OCIParse($conn, $q);

OCI_Execute($result, OCI_COMMIT_ON_SUCCESS);
  if (!$result) {
	
    die("Invalid query -- $q -- " .oci_error());
  }
		
  return $result;
}

 
?>