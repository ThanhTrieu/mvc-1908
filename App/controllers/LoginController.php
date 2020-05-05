<?php
	namespace App\controllers;
	// khong duoc phep truy cap truc tiep !
	if(!defined('ROOT_APP_PATH')){
		die('Can not access this module');
	}
	
	use App\controllers\BaseController;
	use App\models\LoginModel;
	
	class LoginController extends BaseController
	{
		private $db;
		public function __construct()
		{
			$this->db = new LoginModel();
		}
		
		public function index()
		{
			
			$state = $_GET['state'] ?? '';
			$data = [];
			$data['message'] = $state;
			// load header
			$header = [
				'title' => 'This is login page',
				'content' => 'Login page'
			];
			$this->loadHeader($header);
			
			// load content
			$this->loadView('login/index_view', $data);
			
			// load footer
			$this->loadFooter();
		}
		
		public function handle()
		{
			if(isset($_POST['btnLogin'])){
				$user = $_POST['user'] ?? '';
				$pass = $_POST['pass'] ?? '';
				
				$user = trim(strip_tags($user));
				$pass = trim(strip_tags($pass));
				
				if(!empty($user) && !empty($pass)) {
					$checkLogin = $this->db->checkLoginUser($user, $pass);
					if ($checkLogin) {
						$_SESSION['username'] = $user;
						
						header("Location: ?c=home");
					} else {
						header("Location: ?c=login&m=index&state=err");
					}
				} else {
					header("Location: ?c=login&m=index&state=empty");
				}
			}
		}
	}
