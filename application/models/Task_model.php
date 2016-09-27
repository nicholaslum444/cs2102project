<?php
class Task_model extends CI_Model {
    
    public function get_tasks($user_id = -1) {
        $task_sql = "SELECT title, description, start_datetime, end_datetime
                FROM task 
                WHERE creator_id = ?";

        return $this->db->query($task_sql, [$user_id])->result_array();  
    }

    public function create($array) {
        $task_sql = "INSERT INTO task (creator_id, title, description, start_datetime, end_datetime, created_datetime, last_updated_datetime) VALUES (?, ?, ?, ?, ?, now(), now())";

        return $this->db->query($task_sql, $array);
    }
}