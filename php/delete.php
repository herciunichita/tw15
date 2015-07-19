<?php
	include 'core/connection.php';
	$connection = new connection;
	$connection->conecteaza();
	
	$id_inregistrare = $_REQUEST['inreg_id'];
	
	$delete = oci_parse ($connection->getconn(),"DELETE FROM INREGISTRARE WHERE INREG_ID = :MYINREG_ID");
	oci_bind_by_name($delete, ':MYINREG_ID', $id_inregistrare);
	
	$r = ociexecute($delete);
	If (!$r)
		die ("failed deleting from db");
	else header ('Location: ./SeePwds.php');
?>