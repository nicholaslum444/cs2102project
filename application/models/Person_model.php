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
    
    public function create($email, $username, $password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $create_SQL = "INSERT INTO person (email, username, password_hash) VALUES (?, ?, ?)";
        
        return $this->db->query($create_SQL, [$email, $username, $password_hash]);
    }
}