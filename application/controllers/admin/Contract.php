<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('offer_model');
    }

	public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        
        $data['username'] = $session_data['username'];
        $data['user_id'] = $session_data['user_id'];
        
        $data['header'] = 'All Contracts';
        $data['page_title'] = 'All Contracts';
        $data['view'] = 'admin/contract_view';
        $this->load->view('admin/application_view', $data);
	}
}
?>
