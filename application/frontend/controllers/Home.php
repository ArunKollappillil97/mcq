<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this_uid = $this->session->userdata('user_id');
	}

	public function index(){
		
		$this->load->view('home');
	}
}