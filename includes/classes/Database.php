<?php
	require_once "../libraries/adodb5/adodb.inc.php";
	require_once "../config/config.php";
	/**
	* 

	*/
	class Database
	{
		public $host = "localhost";
		public $dbname = "";
		public $dbusername = "root";
		public $dbpassword = "";
		public $conn = "";

		public function connect(){
			$this->conn	=	newADOConnection("mysqli");
			$RSconn	=	$this->conn->Connect($this->host,$this->dbusername,$this->dbpassword);
			if($RSconn == false)
			{
				die("Unable to connect to the database.");
			}
		}
	}