<?php
	session_start();
	echo $_SESSION['username'];
	
	
	$conn=oci_connect("c##contadmin","oracle","localhost/orcl");
	$query = oci_parse ($conn,"SELECT * FROM UTILIZATOR WHERE USERNAME = :MYUZR");
	oci_bind_by_name ($query, ':MYUZR', $_SESSION['username']);
	
	echo "<br />selecting * from utilizator where the username is ".$_SESSION['username'];
	
	ociexecute($query);
	while (ocifetch($query)){
		echo "<br />".ociresult($query, "USERNAME");
	}
	
	$numberOfRows = oci_num_rows($query);
	
	echo "<br /> number of rows is: ".$numberOfRows;
	
	echo "<br /> <a href='logout.php'> log out </a>";
?>