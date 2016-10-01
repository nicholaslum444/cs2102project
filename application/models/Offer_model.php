<?php
class Offer_model extends CI_Model {
    
    public function create($array) {
    	$offer_sql = "INSERT INTO offer (acceptee_id, task_id, price) VALUES (?, ?, ?)";

    	return $this->db->query($offer_sql, [$array[0], $array[1], $array[2]]);
    }
}