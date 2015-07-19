<?php
	//session_start();
	$username = $_SESSION['username'];
	
	$conn=oci_connect("c##contadmin","oracle","localhost/orcl");
	If(!$conn)
		die("database connection failure");
	
	$requestUserID = oci_parse($conn, "SELECT USER_ID FROM UTILIZATOR WHERE USERNAME = :MYUSERNAME");
	oci_bind_by_name ($requestUserID, ':MYUSERNAME', $username);
	
	$req = ociexecute($requestUserID);
	
	If (!$req)
		die ("failed retrieving user id");
	
	while (ocifetch($requestUserID)) 
		$dbuserid = ociresult($requestUserID, "USER_ID");
	
	//echo "<br /> user id: ".$dbuserid;
	
	$query = oci_parse($conn, "SELECT * FROM ISTORIC WHERE USER_ID = :MYUSER_ID");
	oci_bind_by_name($query, ':MYUSER_ID', $dbuserid);
	
	$r = ociexecute($query);
	If (!$r)
		die ("failed retrieving data from db");
	
	while(ocifetch($query)){
		/*echo "<br/>".ociresult($query,"USER_ID")." ".ociresult($query,"COMANDA")." ".ociresult($query,"TIMESTAMP");*/
      
        echo "<tr><td>" . ociresult($query,"COMANDA") . "</td><td>" . ociresult($query,"TIMESTAMP") . '</td></tr>'; 
        
	}
?>