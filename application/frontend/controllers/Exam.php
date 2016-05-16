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
                $question_number_listt[] = $value = array_merge($value, array('answered_option_id' => '0', 'take_exam' => '0'));
            }
            
            // $question_list = $this->exam_model->process_exam($question_id);

            $option_list = $this->exam_model->select_all_option_by_question_id($question_id);     

            $this->session->set_userdata('question_number_listt', $question_number_listt);
            $this->session->set_userdata('option_list', $option_list);
                          
            redirect('exam/take_exam');
        }else{
                                              
            redirect('exam/take_exam');
        }
    }

    public function take_exam($id=NULL){
        // echo "<pre>";
        // print_r($_SESSION);
        // exit();
        
        $this->load->helper('form');

        $exist_exam = $this->session->userdata('question_number_listt');
        $option_list = $this->session->userdata('option_list');

        $next_question_submit       = $this->input->post('question_submit');
        $previous_question_submit   = $this->input->post('previous_question_submit');
        $previous_question_submit   = $this->input->post('previous_question_submit');


        foreach ($exist_exam as $key => $value) {
            if ($value['take_exam']==0) {
                $take_exam = $value['take_exam'];
                $exam_question_id = $key;
                if($exam_question_id < 0 ) $exam_question_id=0;
                $answered_option_id = $value['answered_option_id'];
                break;
            }else{
                $take_exam=NULL;
                $exam_question_id = 0;
                $answered_option_id = $value['answered_option_id'];
            }
        }


        if ($exist_exam !=NULL) {
            $data= array();
            $data['exam_question']      = $exist_exam[$exam_question_id];
            $data['exam_question_id']   = $exam_question_id;
            $data['answered_option_id'] = $exist_exam[$exam_question_id]['answered_option_id'];
            $data['serial']             = '1';
            $data['number_of_question'] = count($exist_exam);

            $answer_submit = [];

            $this->session->set_userdata($answer_submit);

            if($take_exam==0 && $take_exam !=NULL){
                $this->load->view('subject/exam_page', $data);    
            }

            if($take_exam==NULL){
                $this->load->view('exam/review_page', $data); 
            }

            /*
            | End Exam Section and redirect to View Result 
            **/
            if(isset($end_exam)!=NULL){
               
                redirect('exam/review_exam');
            }
            
        }

    }

    /*
    | Calculate All Take Exam Section and Proccessing Section 
    | Author : Tasfir Hossain Suman
    **/

    public function calculate_current_exam(){
        $next_question_submit       = $this->input->post('next_question_submit');
        $previous_question_submit   = $this->input->post('previous_question_submit');
        $end_exam                   = $this->input->post('end_exam');

        $exam_question_id           = $this->input->post('exam_question_id');

        $ansered_question_option_no = $this->input->post('option');

        /*
        | Thir Section is for Next Question  Section 
        **/
        if ($next_question_submit!=NULL) {

            // echo "<pre>";
            // print_r($_SESSION['question_number_listt'][$exam_question_id]);
            // exit();
            

            $_SESSION['question_number_listt'][$exam_question_id]['answered_option_id'] = $ansered_question_option_no;

            /*
            | Currect or Wrong Answer Calculation 
            **/

            foreach ($_SESSION['option_list'] as $key => $value) {
                if($value['question_id']==$_SESSION['question_number_listt'][$exam_question_id]['id']){
                    
                    if($value['ans']!=0) {
                        $correct_answer= $value['id'];
                        break;
                    }
                }
            }

            if($correct_answer == $ansered_question_option_no){
                $correct_answer == $correct_answer;
            }else{
                $wrong_answer = $ansered_question_option_no;
            }
            /************* end: Wrong Answer Calculation **************************/

            $_SESSION['question_number_listt'][$exam_question_id]['take_exam']          = '1';
            $_SESSION['question_number_listt'][$exam_question_id]['correct_answer']     = $correct_answer;
            $_SESSION['question_number_listt'][$exam_question_id]['wrong_answer']       = $wrong_answer;

            redirect('exam/take_exam');
        }

        /*
        | Thir Section is for Previous Question Section 
        **/
        if ($previous_question_submit!=NULL) {
            $exam_question_id   = $exam_question_id-1;
            if($exam_question_id < 0) $exam_question_id = 0;

            $_SESSION['question_number_listt'][$exam_question_id]['take_exam']='0';

            redirect('exam/take_exam');
        }

        /*
        | Thir Section is for Review All Question Section 
        **/
        $review_all_question = $this->input->post('review_all_question');

        if($review_all_question!=NULL){
            foreach ($_SESSION['question_number_listt'] as $key => $value) {
                $_SESSION['question_number_listt'][$key]['take_exam']= '0';
            }
            redirect('exam/take_exam');
        }
        
        /*
        | Thir Section is for Review Only Missed OR Skipped Question Section 
        **/
        $review_skipped_question    = $this->input->post('review_skipped_question');
        if($review_skipped_question!=NULL){
            foreach ($_SESSION['question_number_listt'] as $key => $value) {
               
                if($value['answered_option_id']==NULL){
                    $_SESSION['question_number_listt'][$key]['take_exam']= '0';
                }
            }
            redirect('exam/take_exam');
        }

        /*
        | End Exam Section and redirect to View Result 
        **/
        if($end_exam!=NULL){
        // echo "<pre>";
        // print_r($_SESSION);
        // exit();
        
        /*
        | Session List 
        **/
        // $_SESSION['question_number_listt'];
        // $_SESSION['option_list'];
        /* *************************************** */

            redirect('exam/review_exam');
        }
        
    }

    /* **************** end: calculate_current_exam ***************** */

    public function take_exam_old($id=NULL){
       
        $this->load->library('form_validation');
        $this->load->helper('form');

        $exist_exam     = $this->session->userdata('question_number_listt');
        $option_list    = $this->session->userdata('option_list');

        if ($exist_exam!=NULL && $_POST!==NULL) {
            
            // $this->form_validation->set_rules('option', 'Option', 'required');

            $end_exam = $this->input->post('end_exam');
            $skipped_question = $this->input->post('skipp_question');
            

            if($end_exam!=NULL) redirect('exam/end_exam/');

            /*
            | For Set Value for Skipping Question 
            **/
            if($skipped_question!=NULL) { 
                $validation_status = TRUE ; 
            }else{
                $validation_status = FALSE ;
            }
            /* ****************************************************** */

            /*
            | For Set Value Next Question 
            **/
            $next_question_submit = $this->input->post('question_submit');
            if($next_question_submit!=NULL) { 
                $next_question_submit = TRUE ; 
            }else{
                $next_question_submit = FALSE ;
            }

            /*
            | For Set Value Previous Question 
            **/
            $previous_question_submit = $this->input->post('previous_question_submit');
            if($previous_question_submit!=NULL) { 
                $previous_question_submit = TRUE ; 
            }else{
                $previous_question_submit = FALSE ;
            }
            /* ********************************************************* */

            // if ($this->form_validation->run()!==$previous_question_submit) {
            if ($previous_question_submit==FALSE) {
  
                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_option_id']==0) {
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

                

            }elseif($previous_question_submit===TRUE){

                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_option_id']==0) {
                        $exam_question_id = $key;
                    }
                }

                echo "<pre>";
                print_r($_SESSION['submited_answer']);
                exit();
                

                $_SESSION['question_number_listt'][$exam_question_id]['answered_option_id']='0';

                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_option_id']==0) {
                        $exam_question_id = $key-1;
                        if($exam_question_id < 0 ) $exam_question_id=0;
                        
                        break;
                    }else{
                        $exam_question_id = 0;
                    }
                }

                if (isset($previous_question_submit)) {
                   $data= array();
                    $data['exam_question']      = $exist_exam[$exam_question_id];
                    $data['exam_question_id']   = $exam_question_id;
                    $data['serial']             = '1';
                    $data['number_of_question'] = count($exist_exam);

                    $answer_submit = [];

                    $this->session->set_userdata($answer_submit);

                    $this->load->view('subject/exam_page', $data);
                }
                /***********************************************************/
            }else{
                $ansered_question_option_no = $this->input->post('option');

                $previous_question_submit = $this->input->post('previous_question_submit');
                $next_next_question_submit = $this->input->post('next_next_question_submit');
                $end_exam = $this->input->post('end_exam');
                $skipped_question = $this->input->post('skipp_question');

                // if ($next_question_submit!=NULL) $next_question_submit = 1;
                if($end_exam!=NULL){ $end_exam = 1; }else{$end_exam = 0; }
                if($skipped_question!=NULL){ $skipped_question = 1; }else{ $skipped_question = 0; }
                /* 
                | Get Submited questin answer array key in variable name is $exam_question_id
                **/
                foreach ($exist_exam as $key => $value) {
                    if ($value['answered_option_id']==0) {
                        $exam_question_id = $key;
                        $submited_question_answered_id = $value['id'];
                        $submited_question_answered_question = $value['question'];
                        break;
                    }
                }

                /*
                | Check Correct Answer from Submited Question 
                **/
                
                    foreach ($option_list as $key => $value) {
                        if($value['ans']!=0){ 
                            $right_answer = $value['id']; 
                            break;
                        }
                    }
                

                /*
                | Wrong Answer Calculation 
                **/
                if($skipped_question!=1){
                    if($ansered_question_option_no!==$right_answer) $wrong_answer=$ansered_question_option_no;
                }
              

                /*
                | Change multiple option value 
                **/
                $_SESSION['question_number_listt'][$exam_question_id]['answered_option_id']='1';

                $_SESSION['submited_answer'][$exam_question_id]= array(
                'id'                => $submited_question_answered_id, 
                'question'          => $submited_question_answered_question,
                'answered_option_id'=> $ansered_question_option_no,
                'skipped'           => $skipped_question, 
                'wrong_answer'      => $wrong_answer
                );

                /* ***************************************************************** */
                redirect('exam/take_exam');

                $ansered_question = $this->input->post('option');
                $next_question_submit = $this->input->post('next_question_submit');
     
                /*
                | Find option_list array Key
                **/

                foreach ($option_list as $key => $value) {
                    if ($value['id']==$ansered_question) {
                        $option_key = $key;
                        break;
                    }
                }

                
                foreach ($option_list as $key => $value) {
                    if ($value['question_id']==$exist_exam[0]['id']) {
                    }
                }

                foreach ($exist_exam as $key => $value) {
                    if ($value['skipped']==0) {
                        $exam_key = $key;
                        break;
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

            }

            



        }else{
            echo "There are No Any Exam";
        }
    }

    public function end_exam($exam_id=NULL){
        $this->session->unset_userdata('question_number_listt');
        $this->session->unset_userdata('option_list');
        
        redirect('exam/review_exam/'.$exam_id);
    }

    public function review_exam($exam_id=NULL){

        $exist_exam         = $this->session->userdata('question_number_listt');
        $submited_answer    = $this->session->userdata('submited_answer');
        $option_list        = $this->session->userdata('option_list');

echo "<pre>";
// print_r($exist_exam);
echo "<br>";
// print_r($submited_answer);
echo "<br>";
print_r($option_list);
exit();

        $get_mcq_exam_question = $this->common_model->getInfo('tbl_exam_question', array('exam_id' => $exam_id));
            $this->load->model('exam_model');

        $question_id = explode(",", $get_mcq_exam_question->question_id);

        
        $question_number_list = $this->exam_model->process_exam($question_id);
        

        $data= array();
        $data['question_number_list']      = $exist_exam;// $question_number_list;
        
        $data['serial']             = '1';
        $data['number_of_question'] = count($exist_exam);

        $this->load->view('exam/review_exam', $data);
    }

    /*
    | View Exam Result Section Start From Here 
    **/
    public function veiw_exam_result(){
        $exist_exam         = $this->session->userdata('question_number_listt');

        $data= array();
        $data['question_number_list']      = $exist_exam;// $question_number_list;
        
        $data['serial']             = '1';
        $data['number_of_question'] = count($exist_exam);

        $this->load->view('exam/veiw_exam_result', $data);
    }
}
