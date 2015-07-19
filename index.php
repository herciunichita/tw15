<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Passer - Log-in</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="card-main">
        <h1>Log-in</h1>
        <br>
        <form action="php/login.php">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" class="login login-submit" value="Login">
        </form>

        <div class="login-help">
            <a href="SignUp.php">Sign up</a>
        </div>

    </div>

    
</body>

</html>