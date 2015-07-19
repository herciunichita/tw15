<?php
	include ('connection.php');
	include ('utilizator.php');
	class signin{
		public $username;
		public $pass;
		
		public function __construct ($u = '', $p = ''){
			$this->username = $u;
			$this->pass = $p;
		}
		
		public function sign_in (){
			$conn = new connection();
			$conn->conbd();
			
			$query = ociparse($conn->getconn(), "SELECT * FROM UTILIZATOR WHERE USERNAME=:MYUSERNAME");
			oci_bind_by_name ($query, ':MYUSERNAME', $this->username);
			If (ociexecute($query)){
				while(ocifetch($query)) {$dbuser = ociresult($query, "USERNAME"); $dbpass = ociresult ($query, "MASTERPWD");}
				if(password_verify($this->pass, $dbpass))
				{
					$_SESSION ['username'] = $this->username;
                    $_SESSION ['password'] = $dbpass;
					header('Location: ../MainPage.php'); 
				}
				else echo "<br /> password incorrect! <br />myhash: ". password_hash ($this->pass, PASSWORD_DEFAULT)."<br />dbhash:".$dbpass;
				
			}
		}
	}
?>