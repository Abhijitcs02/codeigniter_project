<?php

class Login extends CI_Controller{
	public function  index(){
// 		echo "user index";	
// 		$this->load->helper(array('url','html','form'));
		if($this->session->userdata('user_id')){
			return redirect('admin/dashboard');}
		$this->load->view('users/admin_login');
//   	echo base_url('assets/css/bootstrap.min.css');
	}
	
	public function admin_login(){
		if($this->session->userdata('user_id')){
			return redirect('admin/dashboard');}
// 		$this->load->helper(array('url','html','form'));
		
		$this->load->library('form_validation');
// 		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|alpha');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		
		
		if ($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
// 			echo "username:$username, password: $password";
			$login_id = $this->loginmodel->login_valid($username,$password);
// 			echo "loginid: $login_id";
			if($login_id){
				$this->load->library('session');
				$this->session->set_userdata('user_id',$login_id);
// 				echo 'Login success';	
				return redirect('admin/dashboard');
			}
			else 
			{
// 				echo "Password do not match";
				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');
			}
		}
		else
		{
			
			$this->load->view('users/admin_login');
// 			echo 'invalid login';	
// 			echo validation_errors();
		}
// 		echo "user reached admin login page";
	}
	
	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}