<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('status_model');
		$this->load->model('offer_model');
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
	
	public function validate(){
		$offer_id = $this->input->post('offer_id');
		$this->form_validation->set_rules('completion_status', 'Completion Status', 'required');
		
        if ($this->form_validation->run() === false) {
            $this->confirm_create($offer_id);

        } else {
			$employer_id = $this->input->post('employer_id');
			$employee_id = $this->input->post('acceptee_id');
			$task_id = $this->input->post('task_id');
			$completion_status = $this->input->post('completion_status');

            if ($this->contract_model->create($employer_id, $employee_id, $task_id, $offer_id, $completion_status)) {
                $this->success("created");

            } else {
                $this->failure("created");
            }
        }
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
	
	public function confirm_create($offer_id){
		if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
			
			if ($data['offer'] = $this->offer_model->get($offer_id)) {
				$data['completion_status'] = array_merge([''=>'Please Select'], $this->status_model->get_all_statuses());
                $start_datetime_arr = explode(" ",$data['offer']['start_datetime']);
                $end_datetime_arr = explode(" ", $data['offer']['end_datetime']);
                $data['offer']['created_date'] = $start_datetime_arr[0];
                $data['offer']['created_time'] = $start_datetime_arr[1];
                $data['offer']['end_date'] = $end_datetime_arr[0];
                $data['offer']['end_time'] = $end_datetime_arr[1];

                $data['header'] = 'Accept this offer';   
				$data['view'] = 'contract_create_view';
				$data['page_title'] = 'Accept this offer';
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