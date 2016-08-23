<?php

class CategoryController extends Controller{
	//indexController in admin;
	public function indexAction(){
		// echo "123";
		include CUR_VIEW_PATH."cat_list.html";
	}
	
	public function editAction(){
		// echo "123";
		include CUR_VIEW_PATH."cat_edit.html";
	}
	public function addAction(){
		// echo "123";
		include CUR_VIEW_PATH."cat_add.html";
	}
	public function insertAction(){
	}
	public function updateAction(){

	}
	public function deleteAction(){

	}

}