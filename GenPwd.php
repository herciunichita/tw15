<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Generate password</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
    
    <script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    <div class="card-big" id="generator">
        <div class="multiple-elements">
        <p> Number of chars:  </p>
        <input type="number" name="length" min="5" max="30"  id="check1"> <br>
        </div>
        
        <div class="checks"><input type="checkbox" name="capitals" value="ABC" id="check2"> <label> ABC</label> </div>
        <div class="checks"><input type="checkbox" name="small" value="abc" id="check3"> <label>abc</label> </div>
        <div class="checks"><input type="checkbox" name="numbers" value="123" id="check4"> <label>123</label> </div>
        <div class="checks"><input type="checkbox" name="special-ch" value="^&@" id="check5"><label>^$% </label> </div><br>
            
      
        <input type="button" value="Generate!" onclick="genPassword()" class="login-submit">
        <br>
        <p id="generated-password"> </p>
        
    </div>

    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
