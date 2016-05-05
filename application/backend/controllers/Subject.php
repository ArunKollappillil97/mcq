<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function index(){
		$data = array();
		$sub_data = array();

		$sub_data['subject_list'] = $this->common_model->selectAll('tbl_subject');

		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$data['main_content'] = $this->load->view('subject/index', $sub_data, TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$this->load->view('master', $data);
	}

	public function add(){
		$data = array();

		$data['name'] = "";
		$data['category_id'] = "";
		$data['category_list'] = $this->common_model->selectAll('tbl_category');
		$data['serial'] = "";
		$data['submit'] = "Save New Subject";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Subject Name','trim|required');
		$this->form_validation->set_rules('category_id','Category Name','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['header'] = $this->load->view('common/header', '', TRUE);
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

			$data['main_content'] = $this->load->view('subject/add_form', $data, TRUE);

			$data['footer'] = $this->load->view('common/footer', '', TRUE);

			$this->load->view('master', $data);
        }else{
        	$datas = array();

        $datas['name'] = $this->input->post('name');
        $datas['serial'] = $this->input->post('serial');
        $datas['category_id'] = $this->input->post('category_id');

        $this->db->insert('tbl_subject', $datas);

        $msg = "Successfully Create New Subject!!";
        $this->session->set_flashdata('success', $msg);

        redirect("subject/index");
        }

        
	}

	public function edit($id){
		$data = array();

		$content = $this->common_model->getInfo('tbl_subject', array('id' => $id));

		$data['name'] = $content->name;
		$data['category_id'] = $content->category_id;
		$data['category_list'] = $this->common_model->selectAll('tbl_category');
		$data['serial'] = $content->serial;
		$data['submit'] = "Update Subject";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Subject Name','trim|required');
		$this->form_validation->set_rules('category_id','Category Name','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['header'] = $this->load->view('common/header', '', TRUE);
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

			$data['main_content'] = $this->load->view('subject/add_form', $data, TRUE);

			$data['footer'] = $this->load->view('common/footer', '', TRUE);

			$this->load->view('master', $data);
        }else{
        	$datas = array();

        $datas['name'] = $this->input->post('name');
        $datas['serial'] = $this->input->post('serial');
        $datas['category_id'] = $this->input->post('category_id');

        $this->common_model->update('tbl_subject', $datas, array('id' => $id));

        $msg = "Successfully Update Selected Subject!!";
        $this->session->set_flashdata('success', $msg);

        redirect("Subject/index");
        }

        
	}
}