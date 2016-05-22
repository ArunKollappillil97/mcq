<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('form');
	}
    

    public function index(){
    	$this->load->view('category/index');
    }

    public function main_category($category_id){
        $data = array();
        $data['category_info'] = $this->common_model->getInfo('tbl_category', array('id' => $category_id));
        $data['category_id'] = $category_id;

        $data['subject_info'] = $this->common_model->selectAllWhere('tbl_subject', array('category_id' => $category_id));
    	$this->load->view('category/main_category', $data);
    }

    public function subject(){
    	
    }

 
}