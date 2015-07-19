<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Sign Up</title>

    <link rel='stylesheet'>
    <script src="js/operations.js"> </script> 
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="card-main">
        <h1>Sign Up</h1>
        <br>
        <form name="registration" method="post" action="php/register.php">
            <input type="text" name="user" placeholder="Username">
            <!--<input type="email" name="email" placeholder="Email">-->
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="repass" placeholder="Retype password">
            <input type="submit" name="login" class="login login-submit" value="Submit">
        </form>

        <div class="login-help">
            <a href="index.php">Go to Login page</a>
        </div>
    </div>

    
</body>

</html>