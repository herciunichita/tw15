<?php
	/*$password = 'da';
	$passhash = password_hash ($password, PASSWORD_DEFAULT);
	echo "<br />parola: ".$password;
	echo "<br />hash: ".$passhash;
	
	if (password_verify($password, $passhash)) {
		echo '<br />Password is valid!';
		} else {
					echo '<br />Invalid password.';
				}
				*/
	
	/*
	//TEST UTILIZATOR + HASH PENTRU LOG IN --- OK!
	include ('utilizator.php');
	$ut = new utilizator('username','parola');
	echo $ut->getusername();
	echo "<br />";
	echo $ut->getpassword();
	if ($ut->checkpwd('parola')) {
		echo '<br />Password is valid!';
		} else {
					echo '<br />Invalid password.';
				}
	*/
	
	include ('inregistrare.php');
	$inreg = new inregistrare (1,73,'titlu','uzr','email','site','pwd','comments','25-JUN-2016',0);
	$inreg->insert();
?>