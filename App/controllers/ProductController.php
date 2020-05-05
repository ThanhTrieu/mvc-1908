<?php
	namespace App\controllers;
	
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	use App\controllers\BaseController;
	use App\models\ProductModel;
	
	class ProductController extends BaseController
	{
		private $db;
		function __construct()
		{
			$this->db = new ProductModel;
		}
		
		public function detail()
		{
			echo "This is function " . __FUNCTION__ . " of class " . __CLASS__;
		}
		
		public function index()
		{
			// xu ly du lieu
			$data = [];
			$products = $this->db->getAllDataProduct();
			$data['lstProducts'] = $products;
			$data['name'] = 'Danh sach san pham';
			// day ca mang data ra ngoai view
			
			// load header
			$header = [
				'title' => 'This is product page',
				'content' => 'Product page'
			];
			$this->loadHeader($header);
			
			// load content
			// bien $data duoc day ra ngoai view
			$this->loadView('product/index_view', $data);
			
			// load footer
			$this->loadFooter();
		}
	}
