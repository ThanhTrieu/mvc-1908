<?php
	namespace App\models;
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	use App\configs\Database;
	use \PDO;
	
	class ProductModel extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function getAllDataProduct()
		{
			// cach viet pdo get data tu db
			$data = [];
			$sql = "SELECT * FROM `products`";
			// chuan bi thuc thi cau lenh sql
			//  Prepares a statement for execution and returns a statement object
			$stmt = $this->db->prepare($sql);
			if($stmt){
				// thuc thi lenh
				if($stmt->execute()){
					// kiem tra xem cos du lieu nao dc tra ve
					if($stmt->rowCount() > 0){
						// gan du lieu vao mang data
						$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
				}
				// neu con cac lenh khac thi dc phep thuc thi tiep
				$stmt->closeCursor();
			}
			
			return $data;
		}
	}
