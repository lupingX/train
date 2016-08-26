<?php

class LoginController extends Controller{
	public function loginAction(){
		include CUR_VIEW_PATH. "login.html";
	}
	public function signinAction(){
		$data['admin_name']=trim($_POST['admin_name']);
		$data['password']=trim($_POST['password']);
		$data['captcha']=trim($_POST['captcha']);
		if ($_SESSION['captcha'] != $data['captcha']){
			$this->jump("index.php?p=admin&c=Login&a=login","captcha wrong",3);

		}
		else{
				$adminModel = new AdminModel('admin');
				if ($adminModel ->checkAdmins($data['admin_name'],$data['password'])){
					
					$_SESSION['admin']  =$data['admin_name'];
					$this->jump("index.php?p=admin&c=Index&a=index","success",0);
				}
				else
					
					$this ->jump("index.php?p=admin&c=Login&a=login","username or password wrong",2);
			}
	}
	public function clearAction(){
		unset($_SESSION['admin']);
		session_destroy();
		$this->jump("index.php?p=admin&c=Login&a=login","",0);

	}
	public function logoutAction(){
		unset($_SESSION['admin']);
		session_destroy();
		$this->jump("index.php?p=admin&c=Login&a=login","",0);
	}
	public function captchaAction(){
		$this->lib("Captcha.class");
		$cache = new Captcha();
		$cache->generateCode();
	 	$_SESSION['captcha'] =$cache->getCode();
	}
}