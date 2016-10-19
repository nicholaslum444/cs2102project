<?php
class Status_model extends CI_Model {
    function get_all_statuses() {
        $get_all_SQL = 'SELECT unnest(enum_range(NULL::status_type)) as value';
        
        $get_all_result = $this->db->query($get_all_SQL)->result_array();
        
        $statuses = [];
        foreach($get_all_result as $row) {
            $statuses[$row['value']] = $row['value'];
        }
        return $statuses;
    }
}
