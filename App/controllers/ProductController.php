<?php
	namespace App\controllers;
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	use App\controllers\BaseController;
	
	class ProductController extends BaseController
	{
		public function detail()
		{
			echo "This is function " . __FUNCTION__ . " of class " . __CLASS__;
		}
		
		public function index()
		{
			// load header
			$header = [
				'title' => 'This is product page',
				'content' => 'Product page'
			];
			$this->loadHeader($header);
			
			// load content
			$this->loadView('product/index_view');
			
			// load footer
			$this->loadFooter();
		}
	}
