<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
    }

	public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['user_id'] = $session_data['user_id'];
            $data['tasks'] = $this->task_model->get_user_tasks($session_data['user_id']);
            $data['header'] = 'NUSMaids Home';
            
            $data['view'] = 'home_view';
            $data['page_title'] = 'Home';
            $this->load->view('application_view', $data);
            
        } else {
            redirect('login', 'refresh');
        }
	}
}
?>