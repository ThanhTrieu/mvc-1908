<?php
	namespace App\configs;
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	class Database
	{
		protected $db;
		
		function __construct()
		{
			$this->connection();
		}
		
		private function connection()
		{
			try {
				$this->db = new \PDO('mysql:host=localhost;dbname=shoes;charset=UTF8', 'root', '');
				return $this->db;
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		
		private function closeConnection()
		{
			// ngat ket noi den db
			$this->db = null;
		}
		
		function __destruct()
		{
			// TODO: Implement __destruct() method.
			$this->closeConnection();
		}
	}
