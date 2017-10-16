<?php

class Loginmodel extends CI_Model {
	public function getValues(){
		$this->load->database();
		// 		$q = $this->db->query("SELECT * FROM table_test");
		$q = $this->db->select(['first_name','last_name'])
		->get("table_test");
		// 		$q = $this->db->select('first_name','last_name')
		// 					->get("table_test");
		$result = $q->result_array();
		// 		echo "<pre>";
		
		return $result;
		//print_r($result);
		// 		return [
		// 				['first_name'=>'ABC','last_name'=>'XYZ'],
		// 				['first_name'=>'ABC','last_name'=>'XYZ']
		// 		];
	}
	
	public function login_valid($username , $password){
		$q = $this->db->where(['uname'=>$username , 'pname'=>$password])
		->get("users");
// 		echo $q->num_rows();
		if($q->num_rows()){
			echo "<pre>";
// 			print_r($q->result());exit;
			echo "success";
			return $q->row()->id;
			
		}else{
			return FALSE;
		}
	}
}