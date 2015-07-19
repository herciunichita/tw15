<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Welcome!</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
    
    <!--<script type="text/javascript" src="js/operations.js"></script>-->
	<script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
</head>

<body>

    <div id="header">
        <?php include( "header.php"); ?>
    </div>
    <div class="card-big">
        <h1>Stored Passwords - Please select a category</h1> <br>
		<form action="php/seepwd.php">
			<select name="cat" class="cat">
				<option value="-1">All</option>
                <option value="0">Shopping</option>
                <option value="1">Personal</option>
                <option value="2">Social</option>
                <option value="3">Hobby</option>
                <option value="4">Work</option>
            </select> 
			<input type="submit" name="submit" class="login login-submit" value="See">
		</form>
    </div>
     <!--    
	<table id="table">          
  <thead>
    <tr><th colspan="7">My stored passwords</th></tr>
  </thead>
  
  <tbody>
     <?php //include 'php/seepwd.php';?>
  </tbody>
  
</table>
-->
    <div id=secretHash style=""> </div>
    <div id="footer">
        <?php include( "footer.php"); ?>
    </div>
</body>

</html>