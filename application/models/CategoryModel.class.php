<?php

class CategoryModel extends Model{
	public function getCats(){
		$sql  = "SELECT * FROM {$this->table}";
		$unsort = ($this->db->getAll($sql));
		// var_dump($unsort);
		return $this->resort($unsort);
	}
	public function resort($arr,$pid =0,$level=0){
		static $res = array();
		foreach ($arr as $as){
			if ($as['parent_id']==$pid) {
				$as['level']=$level;
				$res[]=$as;
				$this->resort($arr,$as['cat_id'],$level+1);
			}
		}
		return $res;
	}

}