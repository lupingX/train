<?php

class CategoryController extends Controller{
	public function addAction(){
		$categoryModel = new CategoryModel("category");
		$cats = $categoryModel ->getCats();
		include CUR_VIEW_PATH."cat_add.html";
	}
	public function insertAction(){
		$data['cat_name']=trim($_POST['cat_name']);
		$data['parent_id']=$_POST['parent_id'];
		$data['sort_order']=trim($_POST['sort_order']);
		$data['is_show']=$_POST['is_show'];
		$data['cat_desc']=trim($_POST['cat_desc']);
		$data['unit']=trim($_POST['unit']);

		if ($data['cat_name'] == '')
			$this->jump('index.php?p=admin&c=Category&a=add',"must have a name!",3);
		else{
			$categoryModel = new CategoryModel("category");
			if ($categoryModel->insert($data)){
				$this->jump('index.php?p=admin&c=Category&a=index',"success",3);
			}
			else 
				$this->jump('index.php?p=admin&c=Category&a=index',"failed");	
			}
		
	}
	public function indexAction(){
		$categoryModel = new CategoryModel("category");
		$cats = $categoryModel ->getCats();
		 // var_dump($cats);
		include CUR_VIEW_PATH."cat_list.html";
	}
	public function editAction(){
		$cat_id = $_GET['cat_id'];

		$categoryModel = new CategoryModel("category");
		$cats = $categoryModel ->getCats();
		$cat = $categoryModel ->selectByPk($cat_id);
		include CUR_VIEW_PATH."cat_edit.html";
	}
	public function updateAction(){
		$data['cat_id']=$_POST['cat_id'];
		$data['cat_name']=trim($_POST['cat_name']);
		$data['parent_id']=$_POST['parent_id'];
		$data['sort_order']=trim($_POST['sort_order']);
		$data['is_show']=$_POST['is_show'];
		$data['cat_desc']=trim($_POST['cat_desc']);
		$data['unit']=trim($_POST['unit']);

		if ($data['cat_name'] == '')
			$this->jump('index.php?p=admin&c=Category&a=edit',"must have a name!",3);
		else{
			$categoryModel = new CategoryModel("category");
			if ($categoryModel->update($data)){
				$this->jump('index.php?p=admin&c=Category&a=index',"success",3);
			}
			else 
				$this->jump('index.php?p=admin&c=Category&a=index',"failed");	
			}
		
	}
}