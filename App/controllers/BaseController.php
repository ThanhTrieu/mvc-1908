<?php
	namespace App\controllers;
	// controller goc de cac controller khac ke thua vao
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	class BaseController
	{
		public function __call($name, $arguments)
		{
			//echo "{$name} - khong ton tai";
			header("Location: upgrade.php");
		}
		
		protected function loadHeader($header = [])
		{
			$title = $header['title'] ?? '';
			$content = $header['content'] ?? '';
			$keywordSearch = $header['keyword_search'] ?? '';
			require 'App/views/partials/header_view.php';
		}
		
		protected function loadFooter()
		{
			require 'App/views/partials/footer_view.php';
		}
		
		protected function loadView($path, $data = [])
		{
			extract($data);
			// extract : giup chuyen key cua mang data thanh 1 bien hien thi o ngoai view
//			$data = [];
//			$data['a'] = 10;
//			$data['b'] = 10;
			// luc nay muon hien thi du lieu 10 -10 chi can goi
//			$a == 10 || $b == 10
//			$data['lstProducts'] = [
//				[],
//				[],
//				[]
//			];
//			$lstProducts;
			//$path : duong dan cua view : luon luon phai nam trong thu muc views
			require "App/views/{$path}.php";
		}
	}
