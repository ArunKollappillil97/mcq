<?php
class Exam_model extends CI_Model{
    
    public function check_exist_exam($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->from('tbl_exam');
        $query_result= $this->db->get();

        $num_rows = $query_result->num_rows();

        if ($num_rows > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
        

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

    public function create_exam($category_id, $subject_id){
        $this->db->insert('tbl_exam', array('
            user_id' => $this->uid, 
            'exam_status' => 1, 
            'exam_start_time' => date("h:i:sa"),
            'exam_end_time' => date("h:i:sa")
            ));
    }
    
}
