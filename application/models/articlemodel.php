<?php

class Articlemodel extends CI_Model {
	public function getValues(){
		$this->load->database();
		$q = $this->db->select(['first_name','last_name'])
		->get("table_test");

		$result = $q->result_array();
		// 		echo "<pre>";
		
		return $result;
		
	}
	
	public function articles_list(){
		$user_id = $this->session->userdata('user_id');
// 		echo "userid:$user_id";
		$q = $this->db->where('user_id',$user_id)
		->get("articles");
// 		print_r( $q->result());
// 		echo $q->num_rows();
		if($q->num_rows()){
// 			echo "<pre>";
// 						print_r($q->result());exit;
// 			echo "success";
			
			return $q->result();
			
		}else{
			return FALSE;
		}
	}
	
	public function add_article($array){
		return $this->db->insert('articles',$array);
		
	}
	
	public function find_article($article_id){
// 		echo "<pre>";
		$q = $this->db->where('id',$article_id)
		->get('articles');
// 		print_r($query->result());exit;
		if($q->num_rows()){
			// 			echo "<pre>";
			// 						print_r($q->result());exit;
			// 			echo "success";
			
			return $q->result_array();
			
		}else{
			return FALSE;
		}
		
	}
	
	public function update_article($array){
		$this->db->where('id',$array['id'])
		->update('articles',$array);
		
	}
	public function delete_article($id){
// 		$this->db->where('id',$array['id'])->delete('articles');
		$this->db->query('DELETE FROM articles WHERE id='.$id);
		
	}
	
	
	public function search_article($search){
		// 		$this->db->where('id',$array['id'])->delete('articles');
		$q = $this->db->like('title',$search['title'])
				->get('articles');
// 		print_r($search['title']); exit;
// 		$q = $this->db->query("select * FROM articles WHERE tile LIKE \'%".$search['title']."%\'");
// 		print_r($q->result_array()); exit;
		return $q->result();
		
	}
}