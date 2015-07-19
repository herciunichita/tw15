<?php
	class utilizator{
		public $username;
		//public $email;
		public $password;
		
		
		public function __construct($u=''/*,$e=''*/,$p=''){
			$this->username = $u;
			//$email = $e;
			$this->password = password_hash ($p, PASSWORD_DEFAULT);
		}
		
		public function checkpwd ($p = ''){
			return password_verify($p, $this->password);
		}
		public function getusername(){
			return $this->username;
		}
		public function getpassword(){
			return $this->password;
		}
	}
?>