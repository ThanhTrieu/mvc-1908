<?php
	namespace App\controllers;
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	use App\controllers\BaseController;
	use App\models\ColorModel;
	
	class ColorController extends BaseController
	{
		public function index()
		{
			// test query sql to table color
			// insert - update - delete - like ....
			echo "test query sql to table color";
			echo "<br/>";
			echo "<a href='?c=home'>Quay ve trang giao dien</a>";
			echo "<br/>";
			echo "<pre>";
			
			$queryDB = new ColorModel();
			// test cau lenh insert
//			$insert = $queryDB->insertDataColor('Xam u am', 'xam-u-am');
//
//			if($insert){
//				echo "insert thanh cong";
//			} else {
//				echo "insert that bai";
//			}
			
			$update = $queryDB->updateColor('Violet','violet', 1);
			if($update){
				echo "update thanh cong";
			} else {
				echo "update that bai";
			}
			
		}
	}
