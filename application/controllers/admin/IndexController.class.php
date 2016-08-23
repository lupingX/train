<?php

class IndexController extends Controller{
	//indexController in admin;
	public function indexAction(){
		// echo "123";
		include CUR_VIEW_PATH."index.html";
	}
	public function dragAction(){
		// echo "123";
		include CUR_VIEW_PATH."drag.html";
	}
	public function mainAction(){
		// echo "123";
		$admins = new AdminModel("admin");
		$admins ->getAdmins();
		// var_dump($admins);
		include CUR_VIEW_PATH."main.html";
	}
	public function menuAction(){
		// echo "123";
		include CUR_VIEW_PATH."menu.html";
	}
	public function topAction(){
		// echo "123";
		include CUR_VIEW_PATH."top.html";
	}
	public function codeAction(){
		$this->lib("Captcha.class");
		$cache = new Captcha();
		$cache->generateCode();
		// $_SESSION['captcha'] =$cache->getCode();
	}
}