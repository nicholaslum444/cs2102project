<?php
class Account_model extends CI_Model {
    
    public function get_all_usernames() {
        $get_all_SQL = "
            SELECT 
                id,
                username
            FROM 
                account
        ";
        
        $get_all_result = $this->db->query($get_all_SQL)->result_array();
        $usernames = [];
        foreach($get_all_result as $row) {
            $usernames[$row['id']] = $row['username'];
        }
        return $usernames;
    }
    
    public function login($username, $password) {
        $login_SQL = "
            SELECT 
                id,
                username,
                password_hash,
                role
            FROM 
                account
            WHERE 
                username = ?
            LIMIT 1
        ";
        
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
            return FALSE;
        }
    }
    
    public function create($email, $username, $password, $role) {
        // create account
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $create_acct_SQL = "
            INSERT INTO account (
                email, 
                username, 
                password_hash,
                role
            ) VALUES (?, ?, ?, ?)
        ";
        
        $create_acct_query = $this->db->query($create_acct_SQL, [$email, $username, $password_hash, $role]);
        
        return $create_acct_query;
    }
}