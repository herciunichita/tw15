<?php
 session_start();
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
	
	if(isset($_POST['submit'])){
		//$name       = $_FILES['userfile']['name'];  echo "<br />".$name;
		$name = $username.$dbuserid.'.csv'; echo "<br />".$name;
		$temp_name  = $_FILES['userfile']['tmp_name'];  //echo "<br />".$temp_name;
		if(isset($name)){
			if(!empty($name)){      
				$location = '../csvs/';      
            if(move_uploaded_file($temp_name, $location.$name)){ /////////////////////////////////ASTA E RAMURA PE CARE PARSAM CSV-UL
					echo ' uploaded';
					echo '<br />...parsing';
					
					$parse_request = oci_parse ($conn,"BEGIN CSVport.import( :MYFILE, :MYUSER_ID); END;");
					oci_bind_by_name ($parse_request,':MYFILE', $name);
					oci_bind_by_name ($parse_request, ':MYUSER_ID', $dbuserid);
					
					$r = ociexecute ($parse_request);
					If (!$r)
						die ("failed inserting into db");
		
					echo '<script type="text/javascript"> alert("SUCCESS");</script>';
					header('Location: ../SeePwds.php');
				}
			}       
		}  else {
			echo '<script type="text/javascript"> alert("failed upload");</script>';
			header('Location: ../AddNewPwd.php');
		}
	}
?>