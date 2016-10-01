<?php
class Task_model extends CI_Model {
    
    public function get_user_tasks($user_id = -1) {
        $task_sql = "SELECT id, title, description, start_datetime, end_datetime
                FROM task 
                WHERE creator_id = ?";

        return $this->db->query($task_sql, [$user_id])->result_array();  
    }

    public function get_available_tasks($user_id = -1) {
        $task_sql = "SELECT t.id, t.title, t.description, t.start_datetime, t.end_datetime, p.username
                    FROM task t, person p
                    WHERE t.creator_id = p.id
                    AND t.creator_id != ?
                    AND t.id NOT IN (
                        SELECT task_id
                        FROM offer
                        WHERE acceptee_id = ?)";

        return $this->db->query($task_sql, [$user_id, $user_id])->result_array();
    }

    public function get($task_id) {
        $task_sql = "SELECT id, title, description, start_datetime, end_datetime
            FROM task
            WHERE id = ?";

        $task_query = $this->db->query($task_sql, [$task_id]);
        
        if ($task_query->num_rows() == 1) {
            return $task_query->row_array();
        } else {
            return FALSE;
        }
    }

    public function create($array) {
        $task_sql = "INSERT INTO task (creator_id, title, description, start_datetime, end_datetime, created_datetime, last_updated_datetime) VALUES (?, ?, ?, ?, ?, now(), now())";

        return $this->db->query($task_sql, $array);
    }

    public function update($array) {
        $task_sql = "UPDATE task
                    SET (title, description, start_datetime, end_datetime, last_updated_datetime) = 
                    (?, ?, ?, ?, now())
                    WHERE id = ?";

        return $this->db->query($task_sql, $array);
    }

    // Check if user_id is admin or member before deleting
    public function delete($user_id, $task_id) {
        $task_sql = "DELETE FROM task 
                    WHERE id=?";

        return $this->db->query($task_sql, $task_id);            
    }
}