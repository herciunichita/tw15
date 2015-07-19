<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Edit record</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	
	
	 
	<script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    
    <div class="card-big">
     <h1> Edit your password</h1>
	 <form name="edit" method="post" action="php/edit.php">
		<input type="text" name="inreg_id" readonly id="inreg_id" onclick="setData()" placeholder="Click to set the ID">
		<input type="text" name="title" placeholder="Title">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="mail" placeholder="Mail">
            <input type="text" name="site" placeholder="Site">
            <input type="text" name="password" placeholder="Password">
            <br>
            Category: 
            <select name="cat" class="cat">
                <option value="0">Shopping</option>
                <option value="1">Personal</option>
                <option value="2">Social</option>
                <option value="3">Hobby</option>
                <option value="4">Work</option>
            </select>
            <br>
         <div class="multiple-elements"> 
                <p> TTL: </p>
            <input type="date" name="TTL" onchange="return dateValidation()" id="datePicker"> <br />
            </div> <br>
            <input type="text" name="comments" placeholder="Comments">
		<input type="submit" name="login" class="login login-submit" value="Submit changes" onclick="cripteazaPwd()">
	</form>
        
         
    </div>
	<div>
		<div id="myhash" style="display:none;"><?php echo $_SESSION['password']; ?></div>
	</div>
    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
