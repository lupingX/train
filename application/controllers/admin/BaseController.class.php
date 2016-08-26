<?php

class BaseController extends Controller{

	public function __construct(){
		$this->loginCheck();

	}
	public function loginCheck(){
		if(!isset($_SESSION['admin']))
			$this->jump("index.php?p=admin&c=Login&a=login","plz log in first",2);
	}

}