<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Add new password</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	<script src="js/operations.js">
	 <?php include("php/requireLoggedIn.php"); ?> </script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    
    <div class="container">
    <div class="card-big" id="add-new">
        <h1>Add new Password</h1>
        <br>
        <form action="php/addnew.php">
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="mail" placeholder="Mail">
            <input type="text" name="site" placeholder="Site">
            <input type="password" name="password" placeholder="Password" id="genPwd1">
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
               
            </div>
            
            <div class="login-help">
            <a class="links" href="MainPage.php">Back to Main Page</a>
            </div>
        </form>

    </div>
    
    <div class="card-big" id="generate-pwd"> 
        <h1> Generate a password for me </h1>
        <div class="multiple-elements">
        <p> Number of chars:  </p>
        <input type="number" name="length" min="5" max="30"  id="check1"> <br>
        </div>
        <div class="checks"><input type="checkbox" name="capitals" value="ABC" id="check2"> <label> ABC</label> </div>
        <div class="checks"><input type="checkbox" name="small" value="abc" id="check3"> <label>abc</label> </div>
        <div class="checks"><input type="checkbox" name="numbers" value="123" id="check4"> <label>123</label> </div>
        <div class="checks"><input type="checkbox" name="special-ch" value="^&@" id="check5"><label>^$% </label> </div><br>
            
      
        <input type="button" value="Generate!" onclick="genPassword()" class="login-submit">
        <input type="button" value="I like this one" onclick="takePwd()" class="login-submit">
        <br>
        <br>
        Your password is: 
        <div id="generated-password"> </div>
        
    </div>
        <div id="myhash" style="display:none;"><?php echo $_SESSION['password']; ?></div>
    </div>
    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
