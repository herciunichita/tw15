<?php
class connection{
	public $username;
	public $conn;
	public $dbuserid;
	public $timeout;
	
	
	
	function checkTimeout($timeout = 5) {
		if ($timeout !== 0 && isset($_SESSION['last_time']) && time() - $_SESSION['last_time'] > $timeout)  {
			header ('logout.php');
		}
  
		$_SESSION['last_time'] = time();
	}
	
	public function conbd (){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();}
		$this->conn = oci_connect("c##contadmin","oracle","localhost/orcl");
		If(!$this->conn)
			die("database connection failure");	
	}
	
	public function conecteaza(){
	$timeout = 1;
	//if (session_status() == PHP_SESSION_NONE) {
	//	session_start();}
	$this->conbd();
	$this->username = $_SESSION['username'];
	
	$requestUserID = oci_parse($this->conn, "SELECT USER_ID FROM UTILIZATOR WHERE USERNAME = :MYUSERNAME");
		oci_bind_by_name ($requestUserID, ':MYUSERNAME', $this->username);
	
		$req = ociexecute($requestUserID);
	
		If (!$req)
			die ("failed retrieving user id");
	
		while (ocifetch($requestUserID)) 
			$this->dbuserid = ociresult($requestUserID, "USER_ID");
	$this->username = $_SESSION['username'];

	$this->checktimeout($this->timeout);
	}
	
	public function getusername(){
		return $this->username;
	}
	public function getconn(){
		return $this->conn;
	}
	public function getdbuserid(){
		return $this->dbuserid;
	}
}
?>