<?php
	

/* Database Connection */

$sDbHost = 'localhost';
$sDbName = 'arhongo_ecommerce';
$sDbUser = 'root';
$sDbPwd = '';

$con = mysqli_connect($sDbHost,$sDbUser,$sDbPwd,$sDbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

/*$sDbHost = 'localhost';
$sDbName = 'service_app';
$sDbUser = 'root';
$sDbPwd = '';

$dbConn = mysql_connect ($sDbHost, $sDbUser, $sDbPwd) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($sDbName,$dbConn) or die('Cannot select database. ' . mysql_error());
  mysql_set_charset('utf8', $dbConn);*/
?>
