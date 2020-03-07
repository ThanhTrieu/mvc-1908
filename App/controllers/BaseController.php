<?php
	namespace App\controllers;
	// controller goc de cac controller khac ke thua vao
	
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
			require 'App/views/partials/header_view.php';
		}
		
		protected function loadFooter()
		{
			require 'App/views/partials/footer_view.php';
		}
		
		protected function loadView($path, $data = [])
		{
			//$path : duong dan cua view : luon luon phai nam trong thu muc views
			require "App/views/{$path}.php";
		}
	}
