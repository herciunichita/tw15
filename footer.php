<div align="right">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/*
$username = $_SESSION['username'];
if($username!=''){
echo "logged in as ".$username;
echo"<br /><a href='logout.php'> log out </a>";}
Else echo "<a href='index.php'> log in </a>";
//echo"useful links";
*/
if( array_key_exists('username', $_SESSION) ) {
  $username = $_SESSION['username'];
  echo "logged in as ".$username;
  echo"<br /><a href='php/logout.php'> log out </a>";
} else {
  echo "<a href='php/index.php'> log in </a>";
}
?>
</div>