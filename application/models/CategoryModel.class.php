<?php
//this is categroy model for CRUD ;
class AdminModel extends Model{
	public function getCategorys(){
		$sql = "select *from {$this->table}";
		return $this->db->getAll($sql);
	}
}