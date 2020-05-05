<?php
	namespace App\models;
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	use App\configs\Database;
	
	class LoginModel extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function checkLoginUser($username, $password)
		{
			// gia su kiem tra ket noi thanh cong db
			if($this->db){
				// do chua hoc mysql nen fix cung du lieu
				if($username === 'admin' && $password === '123'){
					return true;
				}
				return false;
			}
			return false;
		}
	}
