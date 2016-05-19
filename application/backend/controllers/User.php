<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$data = array();
		$data['user_list'] = $this->common_model->selectAll('users');
		$this->load->view('user/index', $data);
	}

	public function add(){
		$data = array();
		$data['first_name'] = "";
		$data['last_name'] = "";
		$data['username'] = "";
		$data['password'] = "";
		$data['confirm_password'] = "";
		$data['email'] = "";
		$data['user_role'] = "";

		$data['submit'] = "Add New User";
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

		if($this->form_validation->run()==FALSE){
			
			$this->load->view('user/add_form', $data);
		}else{
			$datas = array();
			$datas['first_name'] 		= $this->input->post('first_name');
			$datas['last_name']			= $this->input->post('last_name');
			$datas['username'] 			= $this->input->post('username');
			$datas['password'] 			= md5($this->input->post('password'));
			$datas['email'] 			= $this->input->post('email');
			$datas['user_role'] 		= $this->input->post('user_role');

			$this->db->insert('users', $datas);

			$msg = "Successfully Create a New User";
			$this->session->set_flashdata('success', $msg);
			redirect('user/index');
		}
	}

	public function edit($user_id){
		$user_info = $this->common_model->getInfo('users', array('id' => $user_id));
		$data = array();
		$data['first_name'] = $user_info->first_name;
		$data['last_name'] = $user_info->last_name;
		$data['username'] = $user_info->username;
		$data['email'] = $user_info->email;
		$data['user_role'] = $user_info->user_role;

		$data['submit'] = "Update User";
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run()==FALSE){
			
			$this->load->view('user/add_form', $data);
		}else{
			$datas = array();
			$datas['first_name'] 		= $this->input->post('first_name');
			$datas['last_name']			= $this->input->post('last_name');
			$datas['username'] 			= $this->input->post('username');

			if($this->input->post('password')!=NULL){
				$datas['password'] 		= md5($this->input->post('password'));
			}

			$datas['email'] 			= $this->input->post('email');
			$datas['user_role'] 		= $this->input->post('user_role');

			$this->common_model->update('users', $datas, array('id' => $user_id));

			$msg = "Successfully Update User";
			$this->session->set_flashdata('success', $msg);
			redirect('user/index');
		}
	}

	public function delete($user_id){
		$this->common_model->delete('users', array('id' => $user_id));

		$msg = "Successfully Delete Selected User";
		$this->session->set_flashdata('success', $msg);
		redirect('user/index');
	}
}