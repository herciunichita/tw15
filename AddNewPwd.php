<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Add new password</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	
	<script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    <div class="card-big">
        <h1>Add new Password</h1>
        <br>
        <form action="php/addnew.php">
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="mail" placeholder="Mail">
            <input type="text" name="site" placeholder="Site">
            <div class="multiple-elements">
                <input type="password" name="password" placeholder="Password">
                <input type="button" class="login login-submit" value="Generate a Password" onclick="window.location.href='AddGen.php'">
            </div>
            <br>
            Password category:  
            <select name="cat" class="cat">
                <option value="0">Shopping</option>
                <option value="1">Personal</option>
                <option value="2">Social</option>
                <option value="3">Hobby</option>
                <option value="4">Work</option>
            </select> 
            <div class="multiple-elements"> 
                <p> TTL: </p>
            <input type="date" name="TTL" onchange="return dateValidation()" id="datePicker"> <br />
            </div> <br>
            <input type="text" name="comments" placeholder="Comments">
           <div id="manyButtons"> 
               <input type="submit" name="submit" class="login login-submit" value="Submit" onclick="cripteazaPwd()">
            
               <!--<input type="submit" name="export"  class="login login-submit" value="Export"/> -->
               
            </div>
			<a href="loadcsv.php">Load CSV</a> 
            <div id="myhash" style="display:none;"><?php echo $_SESSION['password']; ?></div>
            <div class="login-help">
            <a class="links" href="MainPage.php">Back to Main Page</a>
            </div>
        </form>

    </div>

    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
