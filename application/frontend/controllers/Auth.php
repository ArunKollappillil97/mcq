<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('auth_model');

		$this->uid = $this->session->userdata('uid');


	
	}

	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'password', 'required');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('login');
		}else{
			$email_address = $this->input->post('email');
			$password = $this->input->post('password');

			$check_login = $this->auth_model->check_login($email_address, md5($password));
			echo "<pre>";
			print_r(md5($password));
			print_r($check_login);
			exit();
			
			if($check_login==TRUE){
				$login_data = array(
					'id' => $check_login->id, 
					'username' => $check_login->username,
					'first_name' => $check_login->first_name,
					'last_name' => $check_login->last_name,
					'email' => $check_login->id, 
					'user_role' => $check_login->user_role, 
					'user_loged' => 1
					);

				$this->session->set_userdata($login_data);

				$msg = "Successfully Loged In";
                $this->session->set_flashdata('success', $msg);

                redirect('my_account');
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
		$this->load->view('register');
	}

	
}
