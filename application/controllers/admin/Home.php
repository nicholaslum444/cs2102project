<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('account_model');
    }

	public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        
        $data['username'] = $session_data['username'];
        $data['user_id'] = $session_data['user_id'];
        $data['user_role'] = $session_data['user_role'];
        
        $data['all_rounders'] = $this->account_model->get_all_rounders();
        
        $data['header'] = 'NUSMaids Admin Home';
        $data['page_title'] = 'Home';
        $data['view'] = 'admin/home/home_view';
        $this->load->view('admin/application_view', $data);
	}
}
?>
