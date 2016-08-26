<?php
//this is admin model for CRUD admin ;
class AdminModel extends Model{
	public function getAdmins(){
		$sql = "select *from {$this->table}";
		return $this->db->getAll($sql);
	}
	public function checkAdmins($username, $password){
		$password=md5( $password);
		// echo $password;
		$sql = "SELECT * FROM {$this -> table } WHERE  admin_name ='$username' AND password= '$password' LIMIT 1";
		// echo $sql;
		return $this ->db->getRow($sql);
	}
}