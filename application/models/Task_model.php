<?php
class Task_model extends CI_Model {
    
    public function get_user_tasks($user_id = -1) {
        $task_sql = "
        SELECT 
            o.task_id as id,
            max(o.price) as max_offer_price, 
            count(o.task_id) as offer_count,
            t.title,
            t.description,
            t.start_datetime, 
            t.end_datetime
        FROM task t, offer o 
        WHERE t.creator_id = ?
        AND t.id = o.task_id
        GROUP BY 
            o.task_id,
            t.title,
            t.description,
            t.start_datetime, 
            t.end_datetime
        ORDER BY count(o.task_id) DESC";

        $with_offer_tasks = $this->db->query($task_sql, [$user_id])->result_array();

        $task_sql2 = "
        SELECT 
            t2.id,
            t2.title,
            t2.description,
            t2.start_datetime,
            t2.end_datetime
        FROM task t2
        WHERE t2.id NOT IN (
            SELECT 
                o.task_id as id
            FROM task t, offer o 
            WHERE t.creator_id = ?
            AND t.id = o.task_id
            GROUP BY 
                o.task_id
        )";

        $no_offer_tasks = $this->db->query($task_sql2, [$user_id])->result_array();
        $this->add_price_and_offer_count_to_tasks($no_offer_tasks);

        for($i = 0; $i < sizeof($no_offer_tasks); $i++) {
            array_push($with_offer_tasks, $no_offer_tasks[$i]);
        }

        return $with_offer_tasks;
    }

    private function add_price_and_offer_count_to_tasks(&$array) {
        for ($i = 0; $i < sizeof($array); $i++) {
            $array[$i]['max_offer_price'] = 0;
            $array[$i]['offer_count'] = 0;
        }
        
        //print_r($array);
        return $array;
    }
    
    public function get_all_tasks() {
        $task_sql = "
            SELECT
                a.username,
                t.id, 
                t.title, 
                t.description, 
                t.start_datetime, 
                t.end_datetime 
            FROM 
                task t,
                account a
            WHERE
                t.creator_id = a.id
            ORDER BY 
                t.id ASC
            ";

        return $this->db->query($task_sql)->result_array();
    }

    public function get_available_tasks($user_id = -1) {
        $task_sql = "SELECT t.id, t.title, t.description, t.start_datetime, t.end_datetime, p.username
                    FROM task t, account p
                    WHERE t.creator_id = p.id
                    AND t.creator_id != ?
                    AND t.id NOT IN (
                        SELECT task_id
                        FROM offer
                        WHERE acceptee_id = ?)";

        return $this->db->query($task_sql, [$user_id, $user_id])->result_array();
    }

    public function get($task_id) {
        $task_sql = "
            SELECT 
                id, 
                title, 
                description, 
                start_datetime, 
                end_datetime, 
                creator_id,
                category,
                price
            FROM 
                task
            WHERE 
                id = ?
        ";

        $task_query = $this->db->query($task_sql, [$task_id]);
        
        if ($task_query->num_rows() == 1) {
            return $task_query->row_array();
        } else {
            return FALSE;
        }
    }

    public function create($array) {
        $task_sql = "INSERT INTO task (creator_id, title, description, start_datetime, end_datetime, category, price, created_datetime, last_updated_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, now(), now())";

        return $this->db->query($task_sql, $array);
    }

    public function update($array) {
        $task_update_SQL = '
            UPDATE
                task
            SET 
                title = ?,
                description = ?,
                start_datetime = ?,
                end_datetime = ?,
                category = ?,
                price = ?,
                last_updated_datetime = now()
            WHERE 
                id = ?
            AND 
                creator_id = ?
        ';

        return $this->db->query($task_update_SQL, $array);
    }

    public function update_admin($array) {
        $task_update_SQL = '
            UPDATE
                task
            SET 
                title = ?,
                description = ?,
                start_datetime = ?,
                end_datetime = ?,
                creator_id = ?,
                last_updated_datetime = now()
            WHERE 
                id = ?
        ';

        return $this->db->query($task_update_SQL, $array);
    }

    // Check if user_id is admin or member before deleting
    public function delete($user_id, $task_id, $user_id) {
        $task_sql = "DELETE FROM task 
                    WHERE id = ?
                    AND creator_id = ?";

        return $this->db->query($task_sql, [$task_id, $user_id]);            
    }
    
    public function delete_admin($task_id) {
        $task_delete_SQL = "
            DELETE FROM 
                task 
            WHERE 
                id = ?
        ";

        return $this->db->query($task_delete_SQL, $task_id);            
    }
}