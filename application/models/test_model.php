<?php

class Test_model extends CI_Model {
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
}