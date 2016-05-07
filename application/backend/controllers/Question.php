<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->uid = $this->session->userdata('uid');
	}

	public function index(){
		$data = array();
		$sub_data = array();

		$sub_data['question_list'] = $this->common_model->selectAll('tbl_question');

		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$data['main_content'] = $this->load->view('question/index', $sub_data, TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$this->load->view('master', $data);
	}

	public function add(){
		$data = array();
		$sub_data = array();

		$sub_data['question'] 		= "";
		$sub_data['category_id'] 	= "";
		$sub_data['subject_id'] 	= "";

		$sub_data['option_one'] 	= "";
		$sub_data['option_two'] 	= "";
		$sub_data['option_three'] 	= "";
		$sub_data['option_four'] 	= "";
		$sub_data['correct_ans'] 	= "";

		$sub_data['category_list'] = $this->common_model->selectAll('tbl_category');
		$sub_data['subject_list'] = $this->common_model->selectAll('tbl_subject');

		$sub_data['submit'] = "Save New Question";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('question','Question Name','trim|required');
		

		
		if ($this->form_validation->run() == FALSE) {
			$data['header'] = $this->load->view('common/header', '', TRUE);
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

			$data['main_content'] = $this->load->view('question/add_form', $sub_data, TRUE);

			$data['footer'] = $this->load->view('common/footer', '', TRUE);

			$this->load->view('master', $data);
        }else{
        	$datas = array();

        $datas['question'] = $this->input->post('question');
        $datas['category_id'] = $this->input->post('category_id');
        $datas['subject_id'] = $this->input->post('subject_id');

        $option=$this->input->post('option');

        $this->db->insert('tbl_question', $datas);
        $insert_id=$this->db->insert_id();

        $ans = $this->input->post('answer');

        foreach ($option as $key => $value) {

        	if ($key!=$ans) {
        		$this->db->insert('tbl_option', array('question_id' => $insert_id, 'option_name' => $value));
        	}else{
        		$this->db->insert('tbl_option', array('question_id' => $insert_id, 'option_name' => $value, 'ans' => 1));
        	}
        	
        	
        }

        $msg = "Successfully Create New Question!!";
        $this->session->set_flashdata('success', $msg);

        redirect("question/index");
        }

        
	}

	public function edit($id){
		$data = array();

		$content = $this->common_model->getInfo('tbl_question', array('id' => $id));
		$option = $this->common_model->selectAllWhere('tbl_option', array('question_id' => $content->id));
		
		$this->load->model('question_model');
		$correct_ans = $this->question_model->get_correct_ans($id);

		$sub_data['question'] 		= $content->question;
		$sub_data['category_id'] 	= $content->category_id;
		$sub_data['subject_id'] 	= $content->subject_id;

		if ($correct_ans!="" OR $correct_ans !=NULL) {
			$sub_data['correct_ans'] 	= $correct_ans->ans;
		}else{
			$sub_data['correct_ans'] 	= "";
		}
		
		if ($option!=NULL) {
			$sub_data['option_one'] 	= $option[0]->option_name;
			$sub_data['option_two'] 	= $option[1]->option_name;
			$sub_data['option_three'] 	= $option[2]->option_name;
			$sub_data['option_four'] 	= $option[3]->option_name;
		}else{
			$sub_data['option_one'] 	= "";
			$sub_data['option_two'] 	= "";
			$sub_data['option_three'] 	= "";
			$sub_data['option_four'] 	= "";
		}
		
		$sub_data['submit'] 		= "Save New Question";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('question','Question Name','trim|required');
		

		
		if ($this->form_validation->run() == FALSE) {
			$data['header'] = $this->load->view('common/header', '', TRUE);
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

			$sub_data['category_list'] = $this->common_model->selectAll('tbl_category');
			$sub_data['subject_list'] = $this->common_model->selectAll('tbl_subject');

			$data['main_content'] = $this->load->view('question/add_form', $sub_data, TRUE);

			$data['footer'] = $this->load->view('common/footer', '', TRUE);

			$this->load->view('master', $data);
        }else{
        	$datas = array();

        $datas['question'] = $this->input->post('question');
        $datas['creator_id'] = $this->uid;
        $datas['category_id'] = $this->input->post('category_id');
        $datas['subject_id'] = $this->input->post('subject_id');

        $option=$this->input->post('option');

        $this->common_model->update('tbl_question', $datas, array('id' => $id));

        
        $insert_id = $id;       

        $ans = $this->input->post('answer');
        
        $this->common_model->delete('tbl_option', array('question_id' => $insert_id));
        
        foreach ($option as $key => $value) {

        	if ($key!=$ans-1) {
        		$this->db->insert('tbl_option', array('question_id' => $insert_id, 'option_name' => $value));
        	}else{
        		$this->db->insert('tbl_option', array('question_id' => $insert_id, 'option_name' => $value, 'ans' => $ans));
        	}
        	
        	
        }

        $msg = "Successfully Create New Question!!";
        $this->session->set_flashdata('success', $msg);

        redirect("question/index");
        }

        
	}

	public function request(){
		$data = array();
		$sub_data = array();

		$sub_data['question_request_list'] = $this->common_model->selectAll('tbl_ask_question');

		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$data['main_content'] = $this->load->view('question/ask_question', $sub_data, TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$this->load->view('master', $data);
	}
}