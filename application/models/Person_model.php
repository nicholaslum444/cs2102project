<?php
class Person_model extends CI_Model {
    
    public function login($username, $password) {
        $login_SQL = "SELECT id, username, password_hash FROM person WHERE username = ? LIMIT 1";
        
        $login_query = $this->db->query($login_SQL, [$username]);
        
        if ($login_query->num_rows() == 1) {
            // get result, and password verify
            $row = $login_query->row();
            $password_hash = $row->password_hash;
            if (password_verify($password, $password_hash)) {
                return $row;
            } else {
                return FALSE;
            }
        } else {
            return false;
        }
    }
}