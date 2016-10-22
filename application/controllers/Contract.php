<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('contract_model');
    }
	
	public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['user_id'] = $session_data['user_id'];
            $data['contracts'] = $this->contract_model->get_all_contracts_by_user($session_data['user_id']);
            $data['header'] = 'My Contracts';   
            $data['view'] = 'contract_view';
            $data['page_title'] = 'My Contracts';
            $this->load->view('application_view', $data);
        }
        else {
            redirect('login', 'refresh');
        }
	}
	
	public function create($contract_id){
		if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        $session_data = $this->session->userdata('logged_in');
        
        $data['user_id'] = $session_data['user_id'];
        $data['username'] = $session_data['username'];
        $data['header'] = 'Accept an offer';
        $data['page_title'] = 'Accept an offer';
        // TODO add accept offer view
		$data['view'] = '';
        $this->load->view('', $data);
	}
    
	public function update($contract_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        $data['user_id'] = $session_data['user_id'];
        $data['username'] = $session_data['username'];

        if (!$data['tasks'] = $this->task_model->get($task_id)) {
            redirect('admin/task', 'refresh');
            return;
        }
        
        $data['all_usernames'] = $this->account_model->get_all_usernames();
        
        // Set start and end date and time input fields 
        // in data array
        $start_datetime_arr = explode(" ",$data['tasks']['start_datetime']);
        $end_datetime_arr = explode(" ", $data['tasks']['end_datetime']);
        $data['tasks']['start_date'] = $start_datetime_arr[0];
        $data['tasks']['start_time'] = $start_datetime_arr[1];
        $data['tasks']['end_date'] = $end_datetime_arr[0];
        $data['tasks']['end_time'] = $end_datetime_arr[1];
        // get creator id and put in data

        $data['header'] = 'Update Contract';   
        $data['page_title'] = 'Update Contract';
        $data['view'] = 'admin/task/task_update_view';
        $this->load->view('admin/application_view', $data);
    }
}
?>