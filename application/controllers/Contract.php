<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('status_model');
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
    
    public function validate_update() {
        $this->form_validation->set_rules('completion_status', 'Completion Status', 'required');
        $session_data = $this->session->userdata('logged_in');
        $contract_id = $this->input->post('id');

        if ($this->form_validation->run() === false) {
           $this->update($contract_id);

        } else {
            $user_id = $session_data['user_id'];
            $completion_status = $this->input->post('completion_status');

            if ($this->contract_model->update_contract_by_id($completion_status, $contract_id)) {
                $this->success("updated");

            } else {
                $this->failure("updated");
            }
        }
    }	
	
	public function update($contract_id) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            if ($data['contract'] = $this->contract_model->get_contract_by_id($contract_id)) {
				$data['completion_status'] = array_merge([''=>'Please Select'], $this->status_model->get_all_statuses());
                $created_datetime_arr = explode(" ",$data['contract']['created_datetime']);
                $last_updated_datetime_arr = explode(" ", $data['contract']['last_updated_datetime']);
                $data['contract']['created_date'] = $created_datetime_arr[0];
                $data['contract']['created_time'] = $created_datetime_arr[1];
                $data['contract']['last_updated_date'] = $last_updated_datetime_arr[0];
                $data['contract']['last_updated_time'] = $last_updated_datetime_arr[1];

                $data['header'] = 'Update Contract Status';   
                $data['view'] = 'contract_update_view';
                $data['page_title'] = 'My Contracts';
                $this->load->view('application_view', $data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }
	
	// TODO CREATE CONTRACT SUCCESS
	private function success($action = 'ACTION_PERFORMED') {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['action_performed'] = $action;
            $data['view'] = 'contract_success_view';
            $this->load->view('application_view', $data);
        }
        else {
        redirect('login', 'refresh');
        }
    }

	// TODO CREATE CONTRACT FAILED
    private function failure($action = 'ACTION_ATTEMPTED') {
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['action_attempted'] = $action;
            $data['view'] = 'contract_failure_view';
            $this->load->view('application_view', $data);
         }
        else {
        redirect('login', 'refresh');
        }
    }
}
?>