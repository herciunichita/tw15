
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Welcome!</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	
	<script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>
</head>

<body>
   
	<div id="header">
    <?php include("header.php"); ?></div>
  
    <div class="card-wide">
        <h2>
                <a href="AddNewPwd.php">Add new</a>
        </h2>
        <p> Access this section to add a new password into your account. 
			We'll keep safe informations like title, website and password's time to live. <br> <br> You
            can also organise them by categories and add useful commnets. <p>

        <h2><a href="SeePwds.php">See stored passwords</a></h2>
        <p> Info about your stored passwords. Here you can add/remove/update data.<p>

        <h2><a href="GenPwd.php">Generate password</a></h2>
        <p> Generate a STRONG, CONFIDENT password.<p>
    </div>
    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>


