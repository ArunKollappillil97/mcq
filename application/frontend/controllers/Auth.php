<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('auth_model');

		$this->uid = $this->session->userdata('user_id');

	}

	public function login(){
				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'key', 'required');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('login');
		}else{
			$email_address = $this->input->post('email');
			$password = $this->input->post('key');

			$check_login = $this->auth_model->check_login($email_address, $password);
			
				
			
			if($check_login==TRUE){
				$login_data = array(
					'user_id' => $check_login->id, 
					'username' => $check_login->username,
					'first_name' => $check_login->first_name,
					'last_name' => $check_login->last_name,
					'email' => $check_login->id, 
					'user_role' => $check_login->user_role, 
					'user_logged' => 1
					);

				$this->session->set_userdata($login_data);

				$msg = "Successfully Loged In";
                $this->session->set_flashdata('success', $msg);

                redirect('my_account/index');

			}elseif ($check_login==FALSE) {
				$msg = "Sorry Incorrect Email OR Password";
                $this->session->set_flashdata('error', $msg);

                // redirect($_SERVER['HTTP_REFERER']);
                redirect('login');
			}else{
				$msg = "Sorry Something is wrong!!";
                $this->session->set_flashdata('error', $msg);

                redirect('login');
			}
		}

		

		
	}

	public function register(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$id = 'sdfsdfsadfsddsf';
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('username', 'User Name', 'callback_check_exist');
		$this->form_validation->set_rules('email', 'Email', 'callback_check_email_exist');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			$this->load->view('register');
		}else{
			
			$data = array();

			$data['first_name'] 		= $this->input->post('first_name');
			$data['last_name'] 			= $this->input->post('last_name');
			$data['username'] 			= $this->input->post('username');
			$email = $data['email'] 	= $this->input->post('email');
			$data['password'] 			= md5($this->input->post('password'));	
			$data['user_role'] 			= '5';
			$data['date'] 				= date("Y-m-d")	;

			$check_email_address = $this->auth_model->check_exist('users', array('email' => $email));

			if ($check_email_address==TRUE) {
				$msg = "Your Email is Already Registered";
		        $this->session->set_flashdata('error', $msg);
		        redirect('register');

				// redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->db->insert('users', $data);

				$msg = "You Are Successfully Registered";
		        $this->session->set_flashdata('success', $msg);

				redirect('login');
			}

		}

		
	}

	public function check_exist($username){
  		
		
		$check_exist_data = $this->auth_model->check_exist('users', array('username' => $username));

		if ($username == $check_exist_data)
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word '.$username.' ');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function check_email_exist($email){
  		
		
		$check_exist_data = $this->auth_model->check_exist('users', array('email' => $email));

		if ($email == $check_exist_data)
		{
			$this->form_validation->set_message('email_check', 'The %s field can not be the word '.$email.' ');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata();

		$msg = "Successfully Loged Out";
        $this->session->set_flashdata('success', $msg);
        redirect('login');

	}

	
}
