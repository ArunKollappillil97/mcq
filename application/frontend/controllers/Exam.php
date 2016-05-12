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

    /*
    | To purpose if user have already any exam unfinished in his/her 
    | database then redirect to his/her exam list dashboard. 
    | Data passing will two table tbl_exam and tbl_exam_question
    | If There are no any unfinished exam then to take exam method
    | 
    **/

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
            
            redirect('exam/take_exam/'.$exam_id);
        }

        
    	// $insert_id = $this->db->insert('tbl_exam', $data);
        //$this->exam_model->create_exam($category_id, $subject_id);

        $number_question = $this->input->post('question_select');

        $first_time = date("h:i:sa");
        $second_time = date("1:i:sa");

        $this->load->library('time_calculator');

        // $result = $this->time_calculator->add_time($first_time);
        $result = $this->time_calculator->add_date_time($first_time);
        
        
    }

    /*
    | By This method process the exam like how many question are there
    | Exam is Already Proccess check 
    | 
    **/

    public function exam_process($exam_id){
        $exist_exam = $this->session->userdata('question_number_listt');
        
        
        if($exist_exam==NULL) {


            $get_mcq_exam_question = $this->common_model->getInfo('tbl_exam_question', array('exam_id' => $exam_id));
            $this->load->model('exam_model');

            $question_id = explode(",", $get_mcq_exam_question->question_id);

            
            $question_number_list = $this->exam_model->process_exam($question_id);
            
            foreach ($question_number_list as $value) {
                $question_number_listt[] = $value = array_merge($value, array('answered_id' => '0', 'skipped' => ''));
                            
            }
            
            
            $question_list = $this->exam_model->process_exam($question_id);
            $option_list = $this->exam_model->select_all_option_by_question_id($question_id);     

            $this->session->set_userdata('question_number_listt', $question_number_listt);
            $this->session->set_userdata('option_list', $option_list);
                          
            redirect('exam/take_exam');
        }else{
                                              
            redirect('exam/take_exam');
        }
    }

    public function take_exam($id=NULL){
        $this->load->library('form_validation');
        $this->load->helper('form');

        $exist_exam = $this->session->userdata('question_number_listt');
        $option_list = $this->session->userdata('option_list');

        if ($exist_exam!=NULL && $_POST!==NULL) {
            // $get_mcq_exam_question = $this->common_model->selectAll('tbl_question');

            $this->form_validation->set_rules('option', 'Option', 'required');

            $end_exam = $this->input->post('end_exam');
            $skipped_question = $this->input->post('skipp_question');

            if($end_exam!=NULL) redirect('exam/end_exam');
            if($skipped_question!=NULL) { $Validation_status = TRUE ; }else{$Validation_status = FALSE ;}

            
            if ($this->form_validation->run() == $Validation_status) {
  
                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_id']==0) {
                        $exam_question_id = $key;
                        break;
                    }else{
                        $exam_question_id = 0;
                    }
                }
                
                $data= array();
                $data['exam_question']      = $exist_exam[$exam_question_id];
                $data['exam_question_id']   = $exam_question_id;
                $data['serial']             = '1';
                $data['number_of_question'] = count($exist_exam);

                $answer_submit = [];

                $this->session->set_userdata($answer_submit);

                $this->load->view('subject/exam_page', $data);
            }else{
                $ansered_question_option_no = $this->input->post('option');

                $question_submit = $this->input->post('question_submit');
                $end_exam = $this->input->post('end_exam');
                $skipped_question = $this->input->post('skipp_question');

                // if ($question_submit!=NULL) $question_submit = 1;
                if($end_exam!=NULL){ $end_exam = 1; }else{$end_exam = 0; }
                if($skipped_question!=NULL){ $skipped_question = 1; }else{ $skipped_question = 0; }
                /* 
                | Get Submited questin answer array key in variable name is $exam_question_id
                **/
                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_id']==0) {
                        $exam_question_id = $key;
                        $submited_question_answered_id = $value['id'];
                        $submited_question_answered_question = $value['question'];
                        break;
                    }
                }

                /*
                | Check Correct Answer from Submited Question 
                **/

                // print_r($submited_question_answered_id);
               var_dump($skipped_question);
                if($skipped_question!=1){
                    foreach ($option_list as $key => $value) {
                        if($value['question_id']==2){
                            echo "<pre>";
                            print_r($value);
                            if($value['ans']!=0) $right_answer = $value['id']; 
                            if($right_answer==$ansered_question_option_no){ $wrong_answer=0; $correct_ans_field = $value['id']; }else{$wrong_answer=$ansered_question_option_no; }
                            
                        }
                        
                    }
                }

                exit();

                /*
                | Change multiple option value 
                **/
                $_SESSION['question_number_listt'][$exam_question_id]['answered_id']='1';

                $_SESSION['submited_answer'][$exam_question_id]= array(
                'id'                => $submited_question_answered_id, 
                'question'          => $submited_question_answered_question,
                'answered_id'       => $ansered_question_option_no,
                'skipped'           => $skipped_question, 
                'wrong_answer'      => $wrong_answer,
                'right_answer'      => $right_answer,
                'correct_ans_field' => $correct_ans_field
                );

                /* ***************************************************************** */
                // redirect('exam/take_exam');

                echo "<pre>";
                $ansered_question = $this->input->post('option');
                $question_submit = $this->input->post('question_submit');
                echo "<pre>";
                print_r($question_submit);
                echo "<br>";
                var_dump($question_submit);
                // exit();
                
                
                print_r($_SESSION['submited_answer']);
                echo "<br>";
                print_r($_POST);
                // print_r($exist_exam[0]);
                echo "<br>";
                print_r($ansered_question);
                echo "<br>";
                print_r($exist_exam[0]);

                echo "<br>";
                echo "string"."<br>";
                print_r($exam_question_id);
                exit();
                /*
                | Find option_list array Key
                **/

                foreach ($option_list as $key => $value) {
                    if ($value['id']==$ansered_question) {
                        $option_key = $key;
                        break;
                    }
                }

                echo "<br>";
                echo "---------------------------";
                echo "<br>";
                foreach ($option_list as $key => $value) {
                    // print_r($exist_exam[0]);
                    if ($value['question_id']==$exist_exam[0]['id']) {
                        // $option_key = $key;
                        // break;
                        print_r($value);
                    }
                }

                echo "<br>";
                echo "---------------------------";
                echo "<br>";
                print_r($option_key);
                echo "<br>";
                print_r($option_list[$option_key]['question_id']);
                // exit();
                foreach ($option_list[$option_key] as $key => $value) {
                    print_r($key);
                    echo "<br>";
                    print_r($value);
                    echo "<br>";
                    if ($key) {
                        # code...
                    }
                }

                // print_r($option_list);
                // exit();
                // print_r($this->session->userdata('question_number_listt'));

                foreach ($exist_exam as $key => $value) {
                    if ($value['skipped']==0) {
                        $exam_key = $key;
                        break;
                        echo "<br>";
                        // print_r($value);
                    }
                }

                /*
                | Find option_list array Key
                **/

                foreach ($option_list as $key => $value) {
                    if ($value['id']==$ansered_question) {
                        $option_key = $key;
                        break;
                    }
                }

                $this->session->set_userdata('ansered_question', $exist_exam[0]);

                print_r($this->session->userdata('ansered_question'));

                echo "<br>";

                // print_r($option_list[86]);

                // echo "HaHaHa";
                // $this->session->set_userdata('question_number_listt'[0], array('skipped' => 1));

                // // print_r($this->session->userdata('question_number_listt')[0]);
                // print_r($_SESSION['question_number_listt'][0]);



                // print_r($_SESSION['question_number_listt'][0]['skipped']='1');



                // print_r($_SESSION['question_number_listt'][0]);
                // exit();

            }

            



        }else{
            echo "There are No Any Exam";
        }
    }

    public function end_exam($exam_id=NULL){
        $exist_exam = $this->session->userdata('question_number_listt');
        $option_list = $this->session->userdata('option_list');

        echo "<pre>";
        print_r($exist_exam);
        echo "<br>";
        print_r($option_list);
        // exit();

        $this->session->unset_userdata('question_number_listt');
        $this->session->unset_userdata('option_list');
        $this->exam_model->end_exam($exam_id);

        redirect('exam/review_exam/'.$exam_id);
    }

    public function review_exam($exam_id=NULL){
        echo "<pre>";
        print_r($_SESSION);
        exit();
        
        $data = array();
        $this->load->view('exam/review_exam', $data);
    }
}
