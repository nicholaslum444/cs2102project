<?php
class Contract_model extends CI_Model {
    
	// basic create function for contract
	public function create_contract($array){
		$contract_sql = "
			INSERT INTO contract(
				id,
				employer_id,
				employee_id,
				task_id,
				offer_id, 
				created_datetime, 
				last_updated_datetime, 
				completion_status
			) VALUES (
				?,
				?,
				?,
				?,
				?,
				now(), 
				now(),
				?
			)";
		return $this->db->query($contract_sql, $array);
	}
	
	// basic read function for contract (search by id)
	public function get_contract_by_id($contract_id){
		$contract_sql = "
			SELECT 
				c.id, 
				c.employer_id,
				c.employee_id,
				c.task_id,
				c.offer_id, 
				c.created_datetime, 
				c.last_updated_datetime,
				c.completion_status
			FROM 
				contract c
			WHERE 
				c.id = ?
		";
		return $this->db->query($contract_sql, $contract_id)->result_array();
	}
	
	// read all function for contract
	public function get_all_contracts(){
		$contract_sql = "
			SELECT 
				c.id,
				a1.username as employer_username,
				a2.username as employee_username,
				t.title,
				c.offer_id,
				c.created_datetime,
				c.last_updated_datetime,
				c.completion_status
			FROM 
				contract c, account a1, account a2, task t
			WHERE
				a1.id=c.employer_id AND
				a2.id=c.employee_id AND
				t.id=c.task_id
		";
		return $this->db->query($contract_sql)->result_array();
	}
	
	// basic update function for contract
	public function update_contract_by_id($array){
		$contract_sql = "
			UPDATE 
				contract
            SET (
				last_updated_datetime, 
				completion_status
			) VALUES (
				now(),
				?
            WHERE id = ?";

        return $this->db->query($contract_sql, $array);
	}
	
	// restrict rights to admin
	// basic delete function for contract
	public function delete_contract($user_id, $contract_id){
		$contract_sql = "
			DELETE FROM 
				contract
			WHERE
				id=?
		";
		return $this->db->query($contract_sql, $contract_id);  
	}
	
}