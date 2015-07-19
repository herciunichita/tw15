<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Edit record</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	<script src="js/operations.js" type="text/javascript">
	 <?php include("php/requireLoggedIn.php"); ?></script>
	 
	<?php
	function delete (){
	//include 'php/core/connection.php';
	$connection = new connection;
	$connection->conecteaza();
	
	$id_inregistrare = $_REQUEST['inreg_id'];
	
	$delete = oci_parse ($connection->getconn(),"DELETE FROM INREGISTRARE WHERE INREG_ID = :MYINREG_ID");
	oci_bind_by_name($delete, ':MYINREG_ID', $id_inregistrare);
	
	$r = ociexecute($delete);
	If (!$r)
		die ("failed deleting from db");
	else header ('Location: ./SeePwds.php');
	}
	/*
	If (isset($_GET['inreg_id'])){
		delete();
	}*/
?>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    
    <div class="card-big">
     <h1> Edit your password</h1>
	 <form name="edit" method="post">
		<input type="text" name="inreg_id" readonly id="inreg_id" onclick="setData()" placeholder="Click to set the ID">
		<input type="text" name="title" placeholder="Title">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="mail" placeholder="Mail">
            <input type="text" name="site" placeholder="Site">
            <input type="text" name="password" placeholder="Password">
            <br>
            Time To Live:  
            <select name="cat" class="cat">
                <option value="0">Shopping</option>
                <option value="1">Personal</option>
                <option value="2">Social</option>
                <option value="3">Hobby</option>
                <option value="4">Work</option>
            </select>
            <br>
            <input type="text" name="comments" placeholder="Comments">
		<input type="submit" name="login" class="login login-submit" value="Submit changes">
		<form name="delete" method="post" action="/php/delete.php">
			<input type="button" name="delete" class="login login-submit" value="Delete this record" action="<?php delete(); ?>">
			<!--<a href="editRecord.php?inreg_id=">Delete </a>-->
		</form>
	</form>
    </div>
    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
