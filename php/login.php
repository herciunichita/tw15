<?php
	/*
	session_start();
	$conn=oci_connect("c##contadmin","oracle","localhost/orcl");
	If (!$conn)
		echo 'Failed to connect to Oracle';
	else 
		echo 'Succesfully connected with Oracle DB <br />';
	If ($_REQUEST['user']=='' || $_REQUEST['pass']=='')
		echo "Make sure you enter your username and password when you log in.";
	Else {
		$query = ociparse($conn, "SELECT * FROM UTILIZATOR WHERE USERNAME=:MYUSERNAME");
		oci_bind_by_name ($query, ':MYUSERNAME', $_REQUEST['user']);
		If (ociexecute($query))
		{
			echo "retrieved users from db successfully <br />";
			while(ocifetch($query)) {echo ociresult($query, "USERNAME"); $dbpass = ociresult ($query, "MASTERPWD");}
			echo "<br />";
			$numberOfRows = oci_num_rows($query);
			echo "<br />";
			echo $numberOfRows . "users found matching the entered login data.";
			
			If ($numberOfRows==1)
				If ($_REQUEST['pass']==$dbpass)
				{
					header('Location: ../MainPage.php');  
					
					$_SESSION ['username'] = $_REQUEST['user'];
					
				}
				Else echo "<br /> password incorrect!";
		}
		Else echo "<br />failed retrieving users from db";
		
	}
	*/
	include '/core/signin.php';
	If ($_REQUEST['user']=='' || $_REQUEST['pass']=='')
		echo "Make sure you enter your username and password when you log in.";
	Else {
		$requser = $_REQUEST['user'];
		$reqpass = $_REQUEST['pass'];
		$s_in = new signin($requser, $reqpass);
		$s_in->sign_in();
		
	}
?>