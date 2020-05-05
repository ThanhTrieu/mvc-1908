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
		
		protected function connection()
		{
			$this->db = true;
			return $this->db;
		}
	}
