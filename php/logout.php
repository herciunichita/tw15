<?php
	session_start();
	echo "user ".$_SESSION['username']." is logging out.";
	session_destroy();
	header('Location: ../index.php');
	
?>