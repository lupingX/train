<?php
//core framework class;
//this class should have 3 functions:
// 1.	ini for all the define and required base classes;
// 2.	dispatch for all the action
// 3.   autoload all the required class for coressponding action;
class Framework{

	static public function run(){
		// echo "hello world";
		self::ini();
		// echo CONTROLLER_PANTH.PLATFORM.DS;
		self::autoload();
		self::dispatch();

	}
	/*
	this function is to define some parameters
	 */
	static private function ini(){
		 define ("DS",DIRECTORY_SEPARATOR);
		 define ("ROOT",getcwd().DS);
		 define ("APP_PATH",ROOT."application".DS);
		 define ("CONFIG_PATH", APP_PATH."config".DS);
		 define ("CONTROLLER_PANTH",APP_PATH."controllers".DS);
		 define ("MODEL_PATH",APP_PATH."models".DS);
		 define ("VIEW_PATH",APP_PATH."views".DS);
		 define ("FRAME_PATH",ROOT."framework".DS);
		 define ("CORE_PAHT",FRAME_PATH."core".DS);
		 define ("DB_PATH",FRAME_PATH."databases".DS);
		 define ("HELPER_PATH",FRAME_PATH."helpers".DS);
		 define ("LIB_PATH",FRAME_PATH."libraries".DS);
		 define ("PUB_PATH",ROOT."public".DS);

		 //get p c a ,index.php?p=admin$c=goods$a=add GoodsController excute Add function;
		 define ("PLATFORM",isset($_GET['P'])?  $_GET['p']:	"admin");
		 define ("CONTROLLER", isset($_GET['c'])? $_GET['c']: 	"Index");
		 define ("ACTION", isset($_GET['a'])? $_GET['a']: 	"index");

		 //get current concroller and view：
		 define ("CUR_CONTROLLER_PATH",CONTROLLER_PANTH.PLATFORM.DS);
		 define ("CUR_VIEW_PATH",VIEW_PATH.PLATFORM.DS);
	} 
	/*
	this function is to dispatch al lthe action (inilize obj and call for action)
	 */
	private static function dispatch(){
		$controller_name = CONTROLLER."Controller";
		$action_name = ACTION."Action";
		$obj = new $controller_name();
		$obj->$action_name();
	}

	private static function autoload(){
		spl_autoload_register('self::load');
	}
	private static function load($className){
		var_dump($className);
		if(substr($className, -10)=="Controller"){
			include CUR_CONTROLLER_PATH."{$className}.class.php";
			echo CUR_CONTROLLER_PATH."{$className}.class.php";

		}else if(substr($className, -5)=="Model"){
			include MODEL_PATH."{$className}.class.php";
			echo MODEL_PATH."{$className}.class.php";
		}else{
			//...
		}
	}
}