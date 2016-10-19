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
        
	// basic create function for contract
    // non-buggy. this one does not specify the id
	public function create($array){
		$contract_sql = "
			INSERT INTO contract(
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
				now(), 
				now(),
				?
			)";
		return $this->db->query($contract_sql, $array);
	}
	
	// basic read function for contract (search by id)
	public function get_contract_by_id($contract_id){
		$get_SQL = "
			SELECT 
				id, 
				employer_id,
				employee_id,
				task_id,
				offer_id, 
				created_datetime, 
				last_updated_datetime,
				completion_status
			FROM 
				contract
			WHERE 
				id = ?
            LIMIT 1
		";
		$get_query = $this->db->query($get_SQL, $contract_id);
        
        if ($get_query->num_rows() == 1) {
            return $get_query->row_array();
        } else {
            return FALSE;
        }
	}
	
	// read all contracts by a user (both as employee and employer)
	public function get_all_contracts_by_user($user_id){
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
				t.id=c.task_id AND
				(a1.id=? OR a2.id=?)
		";
		return $this->db->query($contract_sql, [$user_id, $user_id])->result_array();
	}
	
	// read all function for contract
	public function get_all_contracts(){
		$contract_sql = "
			SELECT 
				c.id,
                o.price,
				a1.username as employer_username,
				a2.username as employee_username,
				t.title,
				c.offer_id,
				c.created_datetime,
				c.last_updated_datetime,
				c.completion_status
			FROM 
				contract c, 
                account a1, 
                account a2, 
                task t,
                offer o
			WHERE
				a1.id = c.employer_id AND
				a2.id = c.employee_id AND
				t.id = c.task_id AND 
                o.id = c.offer_id
            ORDER BY
                c.id ASC
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
    
    public function update_admin($contract_id, $employer_id, $employee_id, $task_id, $offer_id, $completion_status) {
        $update_SQL = '
            UPDATE
                contract
            SET 
                employer_id = ?,
                employee_id = ?,
                task_id = ?,
                offer_id = ?,
                completion_status = ?,
                last_updated_datetime = now()
            WHERE 
                id = ?
        ';
        
        $args = [$employer_id, $employee_id, $task_id, $offer_id, $completion_status, $contract_id];

        return $this->db->query($update_SQL, $args);
    }
    
    public function delete_admin($contract_id) {
        $delete_SQL = "
            DELETE FROM 
                contract
            WHERE 
                id = ?
        ";

        return $this->db->query($delete_SQL, $contract_id);
    }
	
	// restrict rights to admin
	// basic delete function for contract
	// public function delete_contract($user_id, $contract_id){
		// $contract_sql = "
			// DELETE FROM 
				// contract
			// WHERE
				// id=?
		// ";
		// return $this->db->query($contract_sql, $contract_id);  
	// }
	
}
