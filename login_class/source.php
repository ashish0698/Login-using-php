<?php

class source extends db {
	public $Query;
   
	/* 
	        query method accept all databsse quries
	*/

	public function Query($query, $param = []){
		if(empty($param)){
			$this->Query =$this->db->prepare($query);
			return $this->Query->execute();
		}
		else{
			$this->Query = $this->db->prepare($query);
			return $this->Query->execute($param);
		}
	}

	public function CountRows(){
		return $this->Query->rowCount();
	}
	public function FethchAll(){
		return $this->Query->fetchAll(PDO::FETCH_OBJ);
	}
	public function Single(){
		return $this->Query->fetch(PDO::FETCH_OBJ);
	}
}


?>