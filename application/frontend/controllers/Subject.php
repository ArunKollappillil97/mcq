<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
	}
    

    public function index(){
    	$this->load->view('subject/index');
    }

    public function view_details(){

    	$this->load->view('subject/view_details');
    }

    public function subject($id){
        $this->load->library('form_validation');
        // $this->load->view('subject/index');
        $this->load->view('category/subject');
    }

    
 
}