<?php
//this is admin model for CRUD admin ;
class AdminModel extends Model{
	public function getAdmins(){
		$sql = "select *from {$this->table}";
		return $this->db->getAll($sql);
	}
}