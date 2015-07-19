<?php
	include ('connection.php');
	include ('utilizator.php');
	class signup{
		public $username;
		public $pass;
		
		public function __construct ($u = '', $p = ''){
			$this->username = $u;
			$this->pass = $p;
		}
		
		public function sign_up(){
			$conn = new connection();
			$conn->conbd();
			$user = new utilizator ($this->username, $this->pass);
			
			$insert = oci_parse ($conn->getconn(),'INSERT INTO UTILIZATOR (USER_ID,USERNAME,EMAIL,MASTERPWD) VALUES (:MYUSER_ID,:MYUSERNAME,:MYEMAIL,:MYMASTERPWD)');
			$idplaceholder = 0;
			$emailplaceholder = 'a@b.c';
            $usr = $user->getusername();
            $pwd =  $user->getpassword();
			oci_bind_by_name ($insert, ':MYUSER_ID',$idplaceholder);
			oci_bind_by_name ($insert, ':MYUSERNAME',$usr);
			oci_bind_by_name ($insert, ':MYEMAIL', $emailplaceholder);
			oci_bind_by_name ($insert, ':MYMASTERPWD', $pwd);
			
			$r = oci_execute($insert);
			If ($r)
				header('Location: ../index.php');
			Else
				echo 'registration failed due to db failure';
		}
	}
?>