<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		$this->load->view('users/admin_login');
		//$this->load->view('test_view');
	}
	
	public function dashboard()
	{
		$articles = $this->articlemodel->articles_list();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
		//$this->load->view('test_view');
	}
	
	public function add_article(){
		$this->load->view('admin/add_article');
	}
	
	public function store_article(){
// 		$this->load->library('form_validation');
// 		echo $this->form_validation->run('add_article_rules');

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');
		if($this->form_validation->run()){
			$post = $this->input->post();
			unset($post['submit']);
			
// 			print_r($post);
			$this->articlemodel->add_article($post);
			$this->session->set_flashdata('Insertion_success','Article added successfully');
// 			echo "successs";
			return redirect('admin/dashboard');
		} else {
// 			echo "vvvvvvvvv";
// 			echo validation_errors();
			$this->session->set_flashdata('Insertion_failed','Article addition failed');
			return redirect('admin/add_article');
		}
	}
	
	public function edit_article($article_id){
		$articles=$this->articlemodel->find_article($article_id);
// 		print_r(array($articles));exit;
		$data['article'] = $articles;
		$this->load->view('admin/edit_article', $data);
	}
	
	
	public function update_article(){
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');
		if($this->form_validation->run()){
			$post = $this->input->post();
			unset($post['submit']);
			
// 						print_r($post); exit;
			$this->articlemodel->update_article($post);
			$this->session->set_flashdata('Update_success','Article updated successfully');
			// 			echo "successs";
			return redirect('admin/dashboard');
		} else {
			// 			echo "vvvvvvvvv";
			// 			echo validation_errors();
			$this->session->set_flashdata('Insertion_failed','Article addition failed');
			return redirect('admin/add_article');
		}
	}
	
	public function delete_article($article_id){
		$this->articlemodel->delete_article($article_id);
		return redirect('admin/dashboard');
	}
	
	public function search_article(){
// 		$post = $this->input->post();
// 				unset($post['submit']);
// 		print_r($post); exit;
		
		
		//$this->form_validation->set_rules('title-search', 'title-search', 'required');
		//if($this->form_validation->run()){
		$post = $this->input->post();
		unset($post['submit']);
// 		print_r($post); exit;
		$articles=  $this->articlemodel->search_article($post);
// 		print("<pre>");
// 		print_r($articles); exit;
		$data['articles'] = $articles;
		$this->load->view('admin/search_article', $data);
		//}
	}
}