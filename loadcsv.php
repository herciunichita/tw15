<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Add new password</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
	
	<script> <?php include("php/requireLoggedIn.php"); ?></script>

</head>

<body>
	<div id="header">
    <?php include("header.php"); ?></div>
    
	<form enctype="multipart/form-data" action="./php/uploader.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000000000" />
    <!-- Name of input element determines name in $_FILES array -->
    Select csv file: 
	<br /> <input name="userfile" type="file" /> <input type="submit" name="submit" value="Submit"/>
</form>

    <div id="footer">
    <?php include("footer.php"); ?></div>
</body>

</html>
