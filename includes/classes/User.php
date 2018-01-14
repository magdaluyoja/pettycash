<?php 
	require_once "Database.php";
	session_start();
	/**
	* 
	*/
	class User extends Database
	{
		private $username = "";
		private $password = "";
		function __construct($username = "", $password = "")
		{
			$this->connect();
			$this->username = $this->conn->qStr($username);
			$this->password = $this->conn->qStr($password);
		}
		public function login(){
			$GETUSER	= "	SELECT `USERID`, `USERNAME`, `NAME`, `USERLEVEL`, `POSITION`, `DEPARTMENT`, `DEPT_INITIAL`, `DAYSLIMIT`, `ISAPPROVER`, `ISCUSTODIAN`
							FROM ".PCDBASE.".USERS WHERE USERNAME = {$this->username} AND PASSWORD = {$this->password} AND STATUS ='Active'";

			$RSGETUSER = $this->conn->Execute($GETUSER);
			if(!$RSGETUSER){
				$output = array('success'=>false, 'data'=>$this->conn->ErrorMsg()."::".__LINE__);
			}else{
				if($RSGETUSER->RecordCount()){
					$data = $RSGETUSER->fetchNextObj();
					$_SESSION["PC"]["USERNAME"]			=	$RSGETUSER->fields["USERNAME"];
					$_SESSION["PC"]["NAME"]				=	$RSGETUSER->fields["NAME"];
					$_SESSION["PC"]["POSITION"]			=	$RSGETUSER->fields['POSITION'];
					$_SESSION["PC"]["DEPARTMENT"]		=	$RSGETUSER->fields['DEPARTMENT'];
					$_SESSION["PC"]["DEP"]				=	$RSGETUSER->fields['DEPT_INITIAL'];
					$_SESSION["PC"]["ID"]				=	$RSGETUSER->fields['USERID'];
					$_SESSION["PC"]["USERLEVEL"]		=	$RSGETUSER->fields['USERLEVEL'];
					$_SESSION["PC"]["ISAPPROVER"]		=	$RSGETUSER->fields['ISAPPROVER'];
					$_SESSION["PC"]["ISCUSTODIAN"]		=	$RSGETUSER->fields['ISCUSTODIAN'];
					$_SESSION["PC"]["ISSPECIALCHILD"]	=	$RSGETUSER->fields['IS_SPECIAL_CHILD'];
					$output = array('success'=>true, 'data'=>$data);
				}else{
					$output = array('success'=>false, 'data'=>"Invalid Username or Password.");
				}
			}
			echo json_encode($output);
		}
	}

	$userObj = isset($_POST["User"]) ? $_POST["User"] : [];
	$userObj =	json_decode($userObj);
	$action = $userObj->action;
	$user = new User($userObj->username, $userObj->password);
	$user->$action();

