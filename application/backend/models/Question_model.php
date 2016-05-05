<?php
class Question_model extends CI_Model{
    
    
    public function get_correct_ans($id){
        $this->db->select('ans');
        $this->db->where('question_id', $id);
        $this->db->where('ans !=', 0);
        $this->db->from('tbl_option');

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result; 
    }
}