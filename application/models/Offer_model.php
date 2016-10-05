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

	public function get($offer_id = -1) {
        $offer_sql = "SELECT t.title, t.description, t.start_datetime, t.end_datetime, o.price, o.id
            FROM task t, offer o
            WHERE t.id = o.task_id
            AND o.id = ?";

        $offer_query = $this->db->query($offer_sql, [$offer_id]);
        
        if ($offer_query->num_rows() == 1) {
            return $offer_query->row_array();
        } else {
            return FALSE;
        }
    }
    
    public function create($array) {
    	$offer_sql = "INSERT INTO offer (acceptee_id, task_id, price) VALUES (?, ?, ?)";

    	return $this->db->query($offer_sql, [$array[0], $array[1], $array[2]]);
    }

    public function update($array) {
    	$offer_sql = "UPDATE offer
    				SET price = ?
    				WHERE id = ?";
    	return $this->db->query($offer_sql, $array);
    }

    public function delete($acceptee_id, $offer_id) {
    	$task_sql = "DELETE FROM offer 
                    WHERE id=?";

        return $this->db->query($task_sql, $offer_id);   
    }
}