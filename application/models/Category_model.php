<?php
class Category_model extends CI_Model {
    function get_all_categories() {
        $get_all_SQL = 'SELECT unnest(enum_range(NULL::category_type)) as value';
        
        $get_all_result = $this->db->query($get_all_SQL)->result_array();
        
        $categories = [];
        foreach($get_all_result as $row) {
            $categories[$row['value']] = $row['value'];
        }
        return $categories;
    }
}
