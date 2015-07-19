<?php
/*
	session_start();
	$username = $_SESSION['username'];
	
	If ($_REQUEST['inreg_id']=='')
		die("you have to specify the record id");
	
	
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
	
	echo "<br /> user id: ".$dbuserid;
	
	If ($_REQUEST['password']=='')
		die ("password field should not be empty!");
	Else{
		$inreg_id = 10;
		$categ_id = 10; $categ_id-=10;
		$tetele = 'SYSDATE';
		$insertion = oci_parse($conn,"UPDATE INREGISTRARE SET TITLU = :MYTITLU, REG_USERNAME = :MYREG_USERNAME, REG_EMAIL = :MYREG_EMAIL, REG_SITE = :MYREG_SITE, REG_PWD = :MYREG_PWD, COMMENTS = :MYCOMMENTS WHERE INREG_ID = :MYINREG_ID");
		oci_bind_by_name ($insertion, ':MYINREG_ID', $_REQUEST['inreg_id']);
		//oci_bind_by_name ($insertion, ':MYUSER_ID', $dbuserid);
		oci_bind_by_name ($insertion, ':MYTITLU', $_REQUEST['title']);
		oci_bind_by_name ($insertion, ':MYREG_USERNAME', $_REQUEST['username']);
		oci_bind_by_name ($insertion, ':MYREG_EMAIL', $_REQUEST['mail']);
		oci_bind_by_name ($insertion, ':MYREG_SITE', $_REQUEST['site']);
		oci_bind_by_name ($insertion, ':MYREG_PWD', $_REQUEST['password']);
		oci_bind_by_name ($insertion, ':MYCOMMENTS', $_REQUEST['comments']);
		//oci_bind_by_name ($insertion, ':MYINREG_ID', $inreg_id);
		//oci_bind_by_name ($insertion, ':MYTTL', $tetele);
		//oci_bind_by_name ($insertion, ':MYCATEG_ID', $categ_id);
		
		$r = ociexecute($insertion);
		If (!$r)
			die ("failed inserting into db");
		
		 header('Location: ../SeePwds.php');
	}
	*/
	include '/core/inregistrare.php';
	$inreg_id = $_REQUEST['inreg_id'];
	$user_id = 10;
	$titlu = $_REQUEST['title'];
	$regusername = $_REQUEST['username'];
	$regemail = $_REQUEST['mail'];
	$regsite = $_REQUEST['site'];
	$regpwd = $_REQUEST['password'];
	$comments = $_REQUEST['comments'];
	$ttl = $_REQUEST['TTL'];
	$cat = $_REQUEST['cat'];
	
	$inreg = new inregistrare($inreg_id, $user_id, $titlu, $regusername, $regemail, $regsite, $regpwd, $comments,$ttl,$cat);
	
	$inreg->update();
?>