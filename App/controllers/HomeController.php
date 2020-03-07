<?php
	namespace App\controllers;

	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	use App\controllers\BaseController;
	
	class HomeController extends BaseController
	{
		public function index()
		{
			// xu ly du lieu o day
			
			// load header
			$header = [
				'title' => 'This is home page',
				'content' => 'Home page'
			];
			$this->loadHeader($header);
			
			// load content
			$this->loadView('home/index_view');
			
			// load footer
			$this->loadFooter();
		}
	}

