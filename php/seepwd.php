<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Welcome!</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/operations.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
</head>

<body>

    <div id="header">
        <?php include( "../headernested.php"); ?>
    </div>
    <div class="a-card">
        <h1>Stored Passwords</h1> 
		<form action="../php/seepwd.php">
			<select name="cat" class="cat" >
				<option value="-1">All</option>
                <option value="0">Shopping</option>
                <option value="1">Personal</option>
                <option value="2">Social</option>
                <option value="3">Hobby</option>
                <option value="4">Work</option>
            </select> 
			<input type="submit" name="submit" class="login login-submit" value="Submit">
            <input type="button" value="Show passwords" onclick='decriptPwd()' class="login login-submit" id="showpass">
		</form>
    </div>
         <table id="table">
            
  <thead>
    <tr><th colspan="10">My stored passwords</th></tr>
      <tr>
          <td>Username</td>
          <td>Email</td>
          <td>Site</td>
          <td name="pass" hidden>Password</td>
		  <td>Comments</td>
          <td>TTL</td>
          <td>Options</td>
        </thead>
  <tbody>
     <?php
	include '/core/inregistrare.php';
	include '/core/connection.php';
	$conn = new connection;
	$conn->conecteaza();
	$dbuserid = $conn->getdbuserid();
	
	$categ = $_GET["cat"];
	
	If ($categ < 0){
		//afisez toate parolele
		$query = oci_parse($conn->getconn(), "SELECT * FROM INREGISTRARE WHERE USER_ID = :MYUSER_ID");
		oci_bind_by_name($query, ':MYUSER_ID', $dbuserid);
		
		$r = ociexecute($query);
		If (!$r)
			die ("failed retrieving data from db");
		
		while(ocifetch($query)){
			//echo '<tr><td>'.ociresult($query,"INREG_ID") . "</td><td>" . ociresult($query,"TITLU") .  "</td><td>" . ociresult($query,"REG_USERNAME") . "</td><td><input type='button' value='Show Password' class=login-submit action='decriptPwd()' ></td><td>". ociresult($query, "COMMENTS")."</td><td>".ociresult($query, "CATEG_NAME").'</td><td><a href="EditRecord.php" class="button" id="edit-b" onclick="getDetails()"> Edit</a> / <a href="#" class="button"> Delete </a> / <a href="#" class="button"> Details </a></td></tr>'; 
			$inreg = new inregistrare (ociresult($query,"INREG_ID"),ociresult($query,"USER_ID"),ociresult($query,"TITLU"),ociresult($query,"REG_USERNAME"),ociresult($query,"REG_EMAIL"),ociresult($query,"REG_SITE"),ociresult($query,"REG_PWD"),ociresult($query,"COMMENTS"),ociresult($query,"TTL"),ociresult($query,"CATEG_ID"));
			$inreg->afiseaza();
		}
	}
	Else{
		//afisez doar parolele cu categoria $cat
		$query = oci_parse($conn->getconn(), "SELECT * FROM INREGISTRARE WHERE USER_ID = :MYUSER_ID AND CATEG_ID = :MYCATEG_ID");
		oci_bind_by_name($query, ':MYUSER_ID', $dbuserid);
		oci_bind_by_name($query, ':MYCATEG_ID', $categ);
		$r = ociexecute($query);
		If (!$r)
			die ("failed retrieving data from db");
		
		while(ocifetch($query)){
			//echo '<tr><td>'.ociresult($query,"INREG_ID") . "</td><td>" . ociresult($query,"TITLU") .  "</td><td>" . ociresult($query,"REG_USERNAME") . "</td><td><input type='button' value='Show Password' class=login-submit action='decriptPwd()' ></td><td>". ociresult($query, "COMMENTS")."</td><td>".ociresult($query, "CATEG_NAME").'</td><td><a href="EditRecord.php" class="button" id="edit-b" onclick="getDetails()"> Edit</a> / <a href="#" class="button"> Delete </a> / <a href="#" class="button"> Details </a></td></tr>'; 
			$inreg = new inregistrare (ociresult($query,"INREG_ID"),ociresult($query,"USER_ID"),ociresult($query,"TITLU"),ociresult($query,"REG_USERNAME"),ociresult($query,"REG_EMAIL"),ociresult($query,"REG_SITE"),ociresult($query,"REG_PWD"),ociresult($query,"COMMENTS"),ociresult($query,"TTL"),ociresult($query,"CATEG_ID"));
			$inreg->afiseaza();
		}
	}
?>
  </tbody>
</table>
    <div id="myhash" style="display:none;"><?php echo $_SESSION['password'] ?></div>
    <div id="footer">
        <?php include( "../footer.php"); ?>
    </div>
</body>

</html>
