<?php
	error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


	include("config/dbconfig.php");
		
	class DbWork
	{
		public $pdo;
		public $options;

		function __construct()
		{
				$this->$options = array(
				    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				    PDO::ATTR_EMULATE_PREPARES => false
				);
				$this->$pdo = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASS, $this->$options);
				return $this;
		}
		public function getData($sql)
		{
			
				$statement =$this->$pdo->prepare($sql);

				$result=$statement->execute();
				$result = $statement->fetchAll();
				return $result;
		}

		 
		public function insertData($sql)
		{
			$options = array(
				    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				    PDO::ATTR_EMULATE_PREPARES => false
				);
				$pdo = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASS, $options);
				$statement = $this->$pdo->prepare($sql);

				$rows = $statement->execute();
				 
				return $rows;
		}
		

	}
			

								



?>