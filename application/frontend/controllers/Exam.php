<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('exam_model');

		$this->uid = $this->session->userdata('user_id');

		$check_exist_exam = $this->exam_model->check_exist_exam($this->uid);
        $user_role = $this->session->userdata('user_role');
        if (!$this->session->userdata('user_logged') && $user_role!=5) {
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
        }else{
            
            if ($category_id==NULL) $data['category_id']=5;
            if($subject_id==NULL) $data['subject_id']=4;

            $this->db->insert('tbl_exam', $data);
            $exam_id = $this->db->insert_id();
            // $insert_id = $this->exam_model->create_exam($category_id, $subject_id);
            $get_mcq_exam_question = $this->common_model->selectAll('tbl_question');
            
            $question_id = [];
            foreach ($get_mcq_exam_question as $value) {    
                array_push($question_id, $value->id);               
            }

            $question_id = rtrim(implode(',', $question_id), ',');

            $this->db->insert('tbl_exam_question', array('exam_id' => $exam_id, 'question_id' => $question_id, 'status' => 1));
            
            // $this->session->set_userdata($get_mcq_exam_question);

            // echo "<pre>";
            // print_r($question_id);
            // exit();
            redirect('exam/take_exam/'.$exam_id);
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

    public function exam_process($exam_id){
        $exist_exam = $this->session->userdata('question_number_listt');
        // var_dump($exist_exam);
        if($exist_exam==NULL) {


            $get_mcq_exam_question = $this->common_model->getInfo('tbl_exam_question', array('exam_id' => $exam_id));
            $this->load->model('exam_model');

            $question_id = explode(",", $get_mcq_exam_question->question_id);

            
            $question_number_list = $this->exam_model->process_exam($question_id);
            
            foreach ($question_number_list as $value) {
                $question_number_listt[] = $value = array_merge($value, array('examped' => '0', 'skipped' => ''));
                            
            }
            
            $this->session->set_userdata('question_number_listt', $question_number_listt);

            // echo "<pre>";
            // print_r($this->session->userdata('question_number_listt'));
            // exit();
            
            redirect('exam/take_exam');
            // $question_list = $this->exam_model->process_exam();
        }else{
            // echo "<pre>";
            // print_r("sfasfdsaf");
            // exit();
            
            redirect('exam/take_exam');
        }
    }

    public function take_exam($id=NULL){
        $this->load->library('form_validation');
        $this->load->helper('form');

        

        $exist_exam = $this->session->userdata('question_number_listt');

        if ($exist_exam!=NULL && $_POST!==NULL) {
            // $get_mcq_exam_question = $this->common_model->selectAll('tbl_question');

            // echo "<pre>";
            // print_r(count($exist_exam));
            // exit();
            
            

            $data= array();
            $data['exam_question']      = $exist_exam[0];
            $data['serial']             = '1';
            $data['number_of_question'] = count($exist_exam);
            // echo "<pre>";
            // print_r($this->session->userdata());
            // exit();
            
            $answer_submit = [];

            $this->session->set_userdata($answer_submit);

            $this->load->view('subject/exam_page', $data);



        }else{
            echo "There are No Any Exam";
        }
    }
}
