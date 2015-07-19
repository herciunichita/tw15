<?php
/*
session_start();
if( array_key_exists('username', $_SESSION) ) {
  echo "logged in as ".$username;
  echo"<br /><a href='php/logout.php'> log out </a>";
} else {
  header("Location: index.php");
}
*/
	include '/core/connection.php';
	$connection = new connection;
	$connection->conecteaza();
	//$connection->checktimeout($timeout=3);
	if( array_key_exists('username', $_SESSION) ) {
	//echo "logged in as ".$username;
	//echo"<br /><a href='php/logout.php'> log out </a>";
	}
	else {
	header("Location: index.php");
	}
?>