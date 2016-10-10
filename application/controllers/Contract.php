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
            $data['contracts'] = $this->contract_model->get_all_contracts();
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
		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			if ($data['contract'] = $this->contract_model->get($contract_id)){
				// Set start and end date and time input fields 
                // in data array
                $created_datetime_arr = explode(" ",$data['contract']['created_datetime']);
                $last_updated_datetime_arr = explode(" ", $data['contract']['last_updated_datetime']);
                $data['tasks']['start_date'] = $start_datetime_arr[0];
                $data['tasks']['start_time'] = $start_datetime_arr[1];
                $data['tasks']['end_date'] = $end_datetime_arr[0];
                $data['tasks']['end_time'] = $end_datetime_arr[1];
                $data['header'] = 'My Contracts';
                $data['view'] = 'contract_create_view';
                $data['page_title'] = 'My Contracts';
                $this->load->view('application_view', $data);
			} else {
				redirect('login', 'refresh');
			}
			
		} else {
			redirect('login', 'refresh');
		}
	}
    
}
?>