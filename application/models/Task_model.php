<?php
class Task_model extends CI_Model {
    
    public function get_tasks($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('task');
            return $query->result_array();
        }

        $query = $this->db->get_where('task', array('slug' => $slug));
        return $query->row_array();
    }
}