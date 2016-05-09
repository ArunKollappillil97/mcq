<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('exam_model');

		$this->uid = $this->session->userdata('uid');

		$check_exist_exam = $this->exam_model->check_exist_exam($this->uid);

        if (!$this->session->userdata('user_logged')) {
            redirect('login');
        }
	}

	public function index(){

	}

    public function subject($id){
    	$this->load->library('form_validation');
    	// $this->load->view('subject/index');
    	$this->load->view('category/subject');
    }

    // public function exam_page($category_id=5, $subject_id=4){
    public function exam_page(){

    	// $question_set = $this->exam_model->select_question_set_by_subject($category_id, $subject_id);

    	$question_set = $this->common_model->selectAll('tbl_question');

    	// $this->session->set_userdata($question_set);

    	$data = array();
    	$data['question_set'] = $question_set;

    	$this->load->view('subject/exam_page', $data);
    }

    public function create_exam($category_id, $subject_id){
    	$data = array();
    	$data['user_id'] = $this->uid;
    	$this->exam_model->create_exam($category_id, $subject_id);
    }
}
