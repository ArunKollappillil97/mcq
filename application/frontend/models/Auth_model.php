<?php
class Auth_model extends CI_Model{
    
    public function check_login($email, $password){
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', 1);
echo "<pre>";
print_r($email);
echo "<br>";
print_r($password);
exit();

        $this->db->from('users');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    
}
