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
		
		public function getAllDataProductByKeyword($key = '')
		{
			$keyword = "%{$key}%";
			$data = [];
			$sql = "SELECT p.`id` AS `product_id`, p.`name` AS `name_product`, p.`image`, p.`price`, c.`name` AS `name_cate`, b.`name` AS `name_brand`
					FROM `products` AS p
					INNER JOIN `categories` AS c ON p.`cate_id` = c.`id`
					INNER JOIN `brands` AS b ON p.`brand_id` = b.`id`
					WHERE p.`name` LIKE :keyword1 OR p.`price` LIKE :keyword2 OR b.`name` LIKE :keyword3";
			$stmt = $this->db->prepare($sql);
			if($stmt){
				$stmt->bindParam(':keyword1', $keyword, PDO::PARAM_STR);
				$stmt->bindParam(':keyword2', $keyword, PDO::PARAM_STR);
				$stmt->bindParam(':keyword3', $keyword, PDO::PARAM_STR);
				if($stmt->execute()){
					if($stmt->rowCount() > 0){
						$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
				}
				$stmt->closeCursor();
			}
			return $data;
		}
		
		public function getAllDataProductByPage($start, $limited, $key = '')
		{
			$keyword = "%{$key}%";
			$data = [];
			$sql = "SELECT p.`id` AS `product_id`, p.`name` AS `name_product`, p.`image`, p.`price`, c.`name` AS `name_cate`, b.`name` AS `name_brand`
					FROM `products` AS p
					INNER JOIN `categories` AS c ON p.`cate_id` = c.`id`
					INNER JOIN `brands` AS b ON p.`brand_id` = b.`id`
					WHERE p.`name` LIKE :keyword1 OR p.`price` LIKE :keyword2 OR b.`name` LIKE :keyword3 LIMIT :start,:limited";
			$stmt = $this->db->prepare($sql);
			if($stmt){
				$stmt->bindParam(':keyword1', $keyword, PDO::PARAM_STR);
				$stmt->bindParam(':keyword2', $keyword, PDO::PARAM_STR);
				$stmt->bindParam(':keyword3', $keyword, PDO::PARAM_STR);
				$stmt->bindParam(':start', $start, PDO::PARAM_INT);
				$stmt->bindParam(':limited', $limited, PDO::PARAM_INT);
				if($stmt->execute()){
					if($stmt->rowCount() > 0){
						$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
				}
				$stmt->closeCursor();
			}
			return $data;
		}
	}
