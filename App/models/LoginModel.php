<?php
	namespace App\models;
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	use App\configs\Database;
	use \PDO;
	
	class LoginModel extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function checkLoginUser($username, $password)
		{
			$data = [];
			$sql = "SELECT * FROM `admins` AS a WHERE a.`username` = :user AND a.`password` = :pass LIMIT 1";
			$stmt = $this->db->prepare($sql);
			if($stmt){
				// kiem tra - validate tham so truyen vao cau lenh sql
				$stmt->bindParam(':user', $username, PDO::PARAM_STR);
				$stmt->bindParam(':pass', $password, PDO::PARAM_STR);
				// thuc thi cau lenh sql
				if($stmt->execute()){
					// kiem tra xem co du lieu tra ve ko ?
					if($stmt->rowCount() > 0){
						// tra ve 1 dong du lieu
						$data = $stmt->fetch(PDO::FETCH_ASSOC);
					}
				}
				$stmt->closeCursor();
			}
			return $data;
		}
	}
