<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('exam_model');

		$this->uid = $this->session->userdata('user_id');

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

    public function create_exam($category_id=NULL, $subject_id=NULL){
        
    	$data = array();
    	$data['user_id'] = $this->uid;
        $data['exam_status'] = 1;
        $data['number_of_question'] = $this->input->post('question_select');
        $data['date'] = date("Y-m-d");
        $data['exam_start_time'] = date("h:i:sa");
        $data['exam_end_time'] = date("h:i:sa");
        $data['result'] = "Good";
        
        $check_exist_exam = $this->exam_model->check_exist_exam($this->uid);

        if ($check_exist_exam==TRUE) {
            $data['exam_list'] = $this->common_model->selectAllWhere('tbl_exam', array('user_id' => $this->uid));

            $this->load->view('exam/index', $data);            
        }

        // echo "<pre>";
        // print_r($check_exist_exam);
        // exit();
        
    	// $insert_id = $this->db->insert('tbl_exam', $data);
        //$this->exam_model->create_exam($category_id, $subject_id);

        $number_question = $this->input->post('question_select');

        $first_time = date("h:i:sa");
        $second_time = date("1:i:sa");

        $this->load->library('time_calculator');

        // $result = $this->time_calculator->add_time($first_time);
        $result = $this->time_calculator->add_date_time($first_time);
        
        
    }

    public function take_exam($id=NULL){
        if ($id!==NULL OR $id!=="") {
            $get_mcq_exam_question = $this->common_model->selectAll('tbl_question');

            echo "<pre>";
            print_r($get_mcq_exam_question);
            exit();
            




        }
    }
}
