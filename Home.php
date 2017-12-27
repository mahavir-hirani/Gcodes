<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

	include("model/submit.php");

	class User
	{
		
	//create new user
		function createUser()
		{
			
			$sql="insert into user_details values('".$_POST['name']."','".$_POST['email']."','".$_POST['pwd']."','".$_POST['no']."','".$_POST['add']."')";
										
			$insertdata=new DbWork();
			echo $insertdata->insertData($sql);
		
		}

		//check email is exitst ?
		public function isEmailExist($email){

			$sql="select * from user_details where email='".$email."' limit 1";
			$getNumRow=new DbWork();
			echo count($getNumRow->getData($sql));
			
		}
		public function doLogin()
		{

			$sql="select * from user_details where email='".$_POST["login_email"]."' And password='".$_POST["pwd"]."' limit 1";
			$getNumRow=new DbWork();
			$result=$getNumRow->getData($sql);
			$row=count($result);
			if($row==1)
			{
				session_start();
				$_SESSION["loginUser"]=$result[0];
				echo "1";
			}
			else if($row==0)
			{
				echo "Invalid Email And Password ! .";

			}
		}
		public function logOut()
		{
			$_SESSION["loginUser"]="";
			session_unset(); 
			session_destroy();
		}

	}


	$obj=new User();
	
	if (isset($_POST['verify_emails'])) {
			$obj->isEmailExist($_POST['verify_emails']);
		}
	else if(isset($_POST["reg"])){
		$obj->createUser();
	}	
	else if(isset($_POST["login_email"])){
		$obj->doLogin();
	}	




?>