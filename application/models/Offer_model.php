<?php
class Offer_model extends CI_Model {

	public function get_offers_by_acceptee($acceptee_id = -1) {
		$offer_sql = "SELECT t.id as task_id, t.title, t.description, t.start_datetime, t.end_datetime, p.username, o.price, o.id as offer_id
		FROM task t, offer o, account p
		WHERE t.id = o.task_id
		AND p.id = t.creator_id
		AND o.acceptee_id = ?";

		return $this->db->query($offer_sql, [$acceptee_id])->result_array();
	}

    public function get_offers_for_task($task_id = -1) {
        $offer_sql = "SELECT o.acceptee_id, o.price, o.id as offer_id, p.username
        FROM offer o, account p
        WHERE p.id = o.acceptee_id
        AND o.task_id = ?";

        return $this->db->query($offer_sql, [$task_id])->result_array();
    }
    
    public function get_all_offers() {
		$offer_sql = "
            SELECT 
                t.id as task_id, 
                t.title, 
                t.description, 
                t.start_datetime, 
                t.end_datetime, 
                p1.username as task_creator, 
                p2.username as offer_creator, 
                o.price as offer_price,
				t.price as task_price,
                o.id as offer_id
            FROM 
                task t, 
                offer o, 
                account p1,
                account p2
            WHERE 
                t.id = o.task_id AND
                p1.id = t.creator_id AND
                p2.id = o.acceptee_id
			ORDER BY
				o.id ASC
        ";

		return $this->db->query($offer_sql)->result_array();
    }

	public function get($offer_id = -1) {
        $offer_sql = "
			SELECT 
				t.id as task_id, 
				t.title, 
				t.description, 
				t.start_datetime, 
				t.end_datetime, 
				o.price, 
				o.id as offer_id, 
				o.acceptee_id 
            FROM 
				task t, 
				offer o
            WHERE 
				t.id = o.task_id AND 
				o.id = ?
		";

        $offer_query = $this->db->query($offer_sql, [$offer_id]);
        
        if ($offer_query->num_rows() == 1) {
            return $offer_query->row_array();
        } else {
            return FALSE;
        }
    }
    
    public function create($array) {
		// this prevents you from offering on your own task
        $validate_sql = "SELECT creator_id FROM task WHERE id = ?";
        $validate_query = $this->db->query($validate_sql, [$array[1]]);

        if ($validate_query->num_rows() == 1) {
            $creator_id = $validate_query->row()->creator_id;
			
			// if you created the task, you should not offer to do it
            if ($creator_id == $array[0]) {
                return FALSE;
            }
        }

    	$create_offer_SQL = "
			INSERT INTO offer (
				acceptee_id, 
				task_id, 
				price
			) VALUES (?, ?, ?);
		";

    	return $this->db->query($create_offer_SQL, $array);
    }

    public function update($price, $offer_id, $acceptee_id) {
    	$offer_sql = "UPDATE offer
    				SET price = ?
    				WHERE id = ?
                    AND acceptee_id = ?";
    	return $this->db->query($offer_sql, [$price, $offer_id, $acceptee_id]);
    }

    public function update_admin($offer_id, $price, $task_id, $acceptee_id) {
    	$update_offer_SQL = "
			UPDATE 
				offer
			SET 
				price = ?, 
				task_id = ?,
				acceptee_id = ?
			WHERE 
				id = ?
		";
    	return $this->db->query($update_offer_SQL, [$price, $task_id, $acceptee_id, $offer_id]);
    }

    public function delete($acceptee_id, $offer_id) {
    	$offer_sql = "DELETE FROM offer 
                    WHERE id = ?
                    AND acceptee_id = ?";

        return $this->db->query($offer_sql, [$offer_id, $acceptee_id]);   
    }
}
