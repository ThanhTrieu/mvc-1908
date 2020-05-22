<?php
	namespace App\models;
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	use App\configs\Database;
	use \PDO;
	
	class ColorModel extends Database
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		// viet function inster data
		public function insertDataColor($nameColor, $slugColor)
		{
			$creatTime = Date('Y-m-d H:i:s');
			$status = 1;
			$updateTime = null;
			$flag = false;
			
			$sql = "INSERT INTO `colors`(`name`,`slug`,`status`,`created_at`,`updated_at`) VALUES (:nameColor, :slug, :status, :created_at, :updated_at)";
			
			$stmt = $this->db->prepare($sql);
			if($stmt){
				// kiem tra tham so truyen vao sql
				$stmt->bindParam(':nameColor', $nameColor, PDO::PARAM_STR);
				$stmt->bindParam(':slug', $slugColor, PDO::PARAM_STR);
				$stmt->bindParam(':status', $status, PDO::PARAM_STR);
				$stmt->bindParam(':created_at', $creatTime, PDO::PARAM_STR);
				$stmt->bindParam(':updated_at', $updateTime, PDO::PARAM_STR);
				// thuc thi cau lenh
				if($stmt->execute()){
					$flag = true;
				}
				$stmt->closeCursor();
			}
			return $flag;
		}
		
		// viet ham update
		public function updateColor($nameColor, $slugColor, $id)
		{
			$flag = false;
			$sql = "UPDATE `colors` SET `name` = :colorName, `slug` = :slug WHERE `id` = :id";
			$stmt = $this->db->prepare($sql);
			if($stmt){
				$stmt->bindParam(':colorName', $nameColor, PDO::PARAM_STR);
				$stmt->bindParam(':slug', $slugColor, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				// thuc thi cau lenh
				if($stmt->execute()){
					$flag = true;
				}
				$stmt->closeCursor();
			}
			return $flag;
		}
		
		// cho biet ma mau 1 co nhung san pham nao ?
		// viet ham lay du lieu ra
		public function getDataProductByColor($id)
		{
			$data = [];
			$sql = "SELECT p.`name` AS `name_product`, p.`price`, c.`name` AS `color_name`
					FROM `colors` AS c
					INNER JOIN `product_color` AS pc ON c.`id` = pc.`color_id`
					INNER JOIN `products` AS p ON p.`id` = pc.`product_id`
					WHERE c.`id` = :id";
			
		}
		
	}