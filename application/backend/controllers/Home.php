<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->user_role = $this->session->userdata('user_role');
		$this->user_logged = $this->session->userdata('user_logged');
		
        if (!$this->session->userdata('user_logged')) {
                        
            $msg = "Sorry You Are Not Loged In";
            $this->session->set_flashdata('success', $msg);
                        
        	redirect('auth');
    	}
	}

	public function index(){
		$data = array();
	

		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$data['main_content'] = $this->load->view('form', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$this->load->view('master', $data);
		
	}

	public function login(){
		$this->load->view('login');
	}

	public function logout(){
		$this->session->sess_destroy();

		$msg = "Successfully Loged Out";
        $this->session->set_flashdata('success', $msg);
        
        redirect(base_url()."home/login");
	}
}