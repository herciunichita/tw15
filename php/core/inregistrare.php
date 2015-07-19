<?php
	
	class inregistrare{
		public $inreg_id;
		public $user_id;
		public $titlu;
		public $reg_username;
		public $reg_email;
		public $reg_site;
		public $reg_password;
		public $comments;
		public $ttl;
		public $categorie;
		
		public function __construct($iid=1,$uid=1,$t='',$run='',$rem='',$rsi='', $rpw='',$com='', $t2l='', $cat=1){
			$this->inreg_id = $iid;
			$this->user_id = $uid;
			$this->titlu = $t;
			$this->reg_username = $run;
			$this->reg_email = $rem;
			$this->reg_site = $rsi;
			$this->reg_password = $rpw;
			$this->comments = $com;
			$this->ttl = $t2l;
			$this->categorie = $cat;
		}
		
		public function insert (){
			include 'connection.php';
			$connection = new connection;
			$connection->conecteaza();
			
			$this->user_id = $connection->getdbuserid();
			$conn = $connection->getconn();
			$tetele = 'SYSDATE';
			
			$insertion = oci_parse($connection->getconn(),"INSERT INTO INREGISTRARE (INREG_ID, USER_ID, TITLU, REG_USERNAME, REG_EMAIL, REG_SITE, REG_PWD, COMMENTS, TTL, CATEG_ID) VALUES (:MYINREG_ID, :MYUSER_ID, :MYTITLU, :MYREG_USERNAME, :MYREG_EMAIL, :MYREG_SITE, :MYREG_PWD, :MYCOMMENTS, TO_DATE(" . ":MYTTL" . ", 'YYYY-MM-DD'), :MYCATEG_ID)");
			oci_bind_by_name ($insertion, ':MYINREG_ID', $this->inreg_id);
			oci_bind_by_name ($insertion, ':MYUSER_ID', $this->user_id);
			oci_bind_by_name ($insertion, ':MYTITLU', $this->titlu);
			oci_bind_by_name ($insertion, ':MYREG_USERNAME', $this->reg_username);
			oci_bind_by_name ($insertion, ':MYREG_EMAIL', $this->reg_email);
			oci_bind_by_name ($insertion, ':MYREG_SITE', $this->reg_site);
			oci_bind_by_name ($insertion, ':MYREG_PWD', $this->reg_password);
			oci_bind_by_name ($insertion, ':MYCOMMENTS', $this->comments);
			oci_bind_by_name ($insertion, ':MYTTL', $this->ttl);
			oci_bind_by_name ($insertion, ':MYCATEG_ID', $this->categorie);
			
			$r = ociexecute($insertion);
			If (!$r)
				die ("failed inserting into db");
			else header ('Location: ../SeePwds.php');
		}
		public function update (){
			include 'connection.php';
			$connection = new connection;
			$connection->conecteaza();
			
			$this->user_id = $connection->getdbuserid();
			$conn = $connection->getconn();
			
			$updt = oci_parse ($connection->getconn(),"UPDATE INREGISTRARE SET TITLU = :MYTITLU, REG_USERNAME = :MYREG_USERNAME, REG_EMAIL = :MYREG_EMAIL, REG_SITE = :MYREG_SITE, REG_PWD = :MYREG_PWD, COMMENTS = :MYCOMMENTS, TTL = TO_DATE(" . ":MYTTL" . ", 'YYYY-MM-DD'), CATEG_ID = :MYCATEG_ID WHERE INREG_ID = :MYINREG_ID");
			oci_bind_by_name ($updt, ':MYINREG_ID', $this->inreg_id);
			oci_bind_by_name ($updt, ':MYTITLU', $this->titlu);
			oci_bind_by_name ($updt, ':MYREG_USERNAME', $this->reg_username);
			oci_bind_by_name ($updt, ':MYREG_EMAIL', $this->reg_email);
			oci_bind_by_name ($updt, ':MYREG_SITE', $this->reg_site);
			oci_bind_by_name ($updt, ':MYREG_PWD', $this->reg_password);
			oci_bind_by_name ($updt, ':MYCOMMENTS', $this->comments);
			oci_bind_by_name ($updt, ':MYTTL', $this->ttl);
			oci_bind_by_name ($updt, ':MYCATEG_ID', $this->categorie);
			$r = ociexecute($updt);
			If (!$r)
				die ("failed inserting into db");
			else header ('Location: ../SeePwds.php');
			
		}
		
		public function afiseaza (){
			If (strtotime($this->ttl)>time()){
			//echo "<br />".$this->inreg_id;
			//echo "<br />".$this->user_id;
			echo "<tr><th colspan='10'>".$this->titlu."</th></tr>";
			echo "<tbody><tr>";
			echo "<td>".$this->reg_username;
			echo "</td><td>".$this->reg_email;
			echo "</td><td>".$this->reg_site;
			echo "</td><td name='pass' hidden>".$this->reg_password;
			echo "</td><td>".$this->comments;
			echo "</td><td>".$this->ttl;
			echo "</td><td> <a href='../Delete.php?inreg_id=".$this->inreg_id."' onclick='getData(". $this->inreg_id .")'> DEL  </a><br /><a href='../EditRecord.php' onclick='getData(". $this->inreg_id .")'> EDIT  </a></td></tr></tbody>";;
			//echo "<br />".$this->categorie;
			}
			Else {
				//nu afisam nimic, deoarece parola este expirata
				echo "<tr><th colspan='10'>".$this->titlu."</th></tr>";
				echo "<tbody><tr>";
				echo "<td>".$this->reg_username;
				echo "</td><td>".$this->reg_email;
				echo "</td><td>".$this->reg_site;
				echo "</td><td name='pass' hidden>EXPIRED";
				echo "</td><td>".$this->comments;
				echo "</td><td>EXPIRED";
				echo "</td><td> <a href='../Delete.php?inreg_id=".$this->inreg_id."' onclick='getData(". $this->inreg_id .")'> DEL  </a><br /><a href='../EditRecord.php' onclick='getData(". $this->inreg_id .")'> EDIT  </a></td></tr></tbody>";
				//echo "<br />".$this->categorie;
			}
		}
	}
?>