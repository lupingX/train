<?php
//core controller for page change: or more .
class Controller{
	public function jump($url,$message,$wait =3 ){
		if($wait ==0){
			header("Location:$url");
		}else{
			include CUR_VIEW_PATH."message.html";
		}
		exit();
	}
	public function help($helper){
		include HELPER_PATH."{$helper}.php";
	}
	public function lib($lib){
		include LIB_PATH."{$lib}.php";
	}
}