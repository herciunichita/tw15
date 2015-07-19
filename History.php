<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>History</title>

    <link rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
    
    <!--<script type="text/javascript" src="js/operations.js"></script>-->
	<script src="js/operations.js"> <?php include("php/requireLoggedIn.php"); ?></script>
</head>

<body>

    <div id="header">
        <?php include( "header.php"); ?>
    </div>

    <div class="card-wide">
         <table id="table">
            
  <thead>
    <tr><th colspan="5">History</th></tr>
  </thead>
  <tbody>
     <?php include 'php/istoric.php';?>
  </tbody>
</table>
    </div>

    <div id="footer">
        <?php include( "footer.php"); ?>
    </div>
</body>

</html>