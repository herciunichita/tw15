<?php /*http://php.net/manual/en/oci8.examples.php */
/*
$conn=oci_connect("c##contadmin","oracle","localhost/orcl");
	If (!$conn)
		echo  '<script type="text/javascript"> alert("failed to connect to database");</script>';
	else 
		echo '<script type="text/javascript"> alert("succesfully conn to db");</script>';
	
	//If (isset($_REQUEST['submit'])!='')
	//{
		If($_REQUEST['user']=='' || $_REQUEST['email']=='' || $_REQUEST['pass']==''|| $_REQUEST['repass']=='' || $_REQUEST['pass']!=$_REQUEST['repass'])
			echo 'Make sure password and password confirmation match! Please fill in all the details! <br />';
		Else
		{
			$uzr = "'".$_REQUEST['user']."'"; 
			$eml = "'".$_REQUEST['email']."'"; 
			//$uzr = $_REQUEST['user'];
			//$eml = $_REQUEST['email'];
			echo "<br />:MYUZR is ".$uzr;
			echo "<br />:MYEML is ".$eml;
			//$qrr = "SELECT * FROM UTILIZATOR WHERE USERNAME=".$uzr." OR EMAIL=".$eml;
			
			//echo "<br />qrr: ".$qrr;
			
			$query = oci_parse ($conn,"SELECT * FROM UTILIZATOR WHERE USERNAME = :MYUZR OR EMAIL = :MYEML");
			//$query = oci_parse ($conn,$qrr);
			
			oci_bind_by_name ($query, ':MYUZR', $uzr);
			oci_bind_by_name ($query, ':MYEML', $eml);
			
			
			$verificare = oci_execute($query);
			If ($verificare)
			{
				while(ocifetch($query)) 
					//echo "<br />".ociresult($query,"USERNAME");
				
				$numberOfRows = oci_num_rows($query);
				
				echo "<br /> numberOfRows:" .$numberOfRows;
				If ($numberOfRows!=0)
					die ("username or email already used");
			}
			Else
				echo 'validation failed due to db failure';
			
			
			
			$stid = oci_parse ($conn,'INSERT INTO UTILIZATOR (USER_ID,USERNAME,EMAIL,MASTERPWD) VALUES (:MYUSER_ID,:MYUSERNAME,:MYEMAIL,:MYMASTERPWD)');
			
			$idbleg = 60;
			oci_bind_by_name ($stid, ':MYUSER_ID',$idbleg);
			oci_bind_by_name ($stid, ':MYUSERNAME', $_REQUEST['user']);
			oci_bind_by_name ($stid, ':MYEMAIL', $_REQUEST['email']);
			oci_bind_by_name ($stid, ':MYMASTERPWD', $_REQUEST['pass']);
			
			$r = oci_execute($stid);
			If ($r)
				header('Location: ../index.php');
			Else
				echo 'registration failed due to db failure';
			
			oci_free_statement($stid);
			oci_close($conn);
		}
	//}
	*/
	include '/core/signup.php';
	If($_REQUEST['user']=='' || $_REQUEST['pass']==''|| $_REQUEST['repass']=='' || $_REQUEST['pass']!=$_REQUEST['repass'])
			echo 'Make sure password and password confirmation match! Please fill in all the details! <br />';
	Else {
		$requser = $_REQUEST['user'];
		$reqpass = $_REQUEST['pass'];
		$signup = new signup($requser,$reqpass);
		$signup->sign_up();
	}
?>
