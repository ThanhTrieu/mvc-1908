<?php
	namespace App\models;
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	use App\configs\Database;
	
	class ProductModel extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function getAllDataProduct()
		{
			// gia su ket noi dc toi db thi moi get du lieu
			if($this->db){
				return [
					[
						'id' => 1,
						'name' => 'Nokia',
						'price' => 10000,
						'image' => 'nokia.jpg'
					],
					[
						'id' => 2,
						'name' => 'Samsung',
						'price' => 20000,
						'image' => 'samsung.jpg'
					],
					[
						'id' => 3,
						'name' => 'Iphone',
						'price' => 30000,
						'image' => 'iphone.jpg'
					]
				];
			}
		}
	}
