<?php
class Exam_model extends CI_Model{
    
    public function check_exist_exam($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('exam_status !=', 0);
        $this->db->from('tbl_exam');
        $query_result= $this->db->get();

        $num_rows = $query_result->num_rows();

        if ($num_rows > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
        

    }

    public function get_mcq_exam_question($number_of_question, $category_id, $subject_id){
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->order_by('id', 'random');

        $this->db->limit($number_of_question);

        $this->db->from('tbl_question');

        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function select_question_set_by_subject($category_id, $subject_id){
        $sql = "SELECT 
        qu.question as question, op.option_name as option_name, op.ans as answer 
         FROM tbl_question as qu RIGHT JOIN tbl_option as op on qu.id=op.question_id";

        $query_result = $this->db->query($sql);
        // $query_result = $this->db->get();
        $result = $query_result->result_array();
        // echo "<pre>";
        // print_r($result);
        // exit();
        
        return $result; 
    }

    public function create_exam($number_of_question, $category_id, $subject_id){
        $this->db->insert('tbl_exam', array(
            'user_id' => $this->uid, 
            'number_of_question' => $number_of_question, 
            'exam_status' => 1, 
            'exam_start_time' => date("h:i:sa"),
            'exam_end_time' => date("h:i:sa")
            ));
    }

    public function process_exam($exam_id){
        $this->db->select('*');
        $this->db->where_in('id', $exam_id);
        $this->db->from('tbl_question');

        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function select_all_option_by_question_id($question_id_list){
        $this->db->select('*');
        $this->db->where_in('question_id', $question_id_list);
        $this->db->from('tbl_option');

        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function end_exam($exam_id){
        $this->db->set('exam_status', 0);
        $this->db->where('id', $exam_id);
        $this->db->update('tbl_exam');
    }
    
}
