<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('offer_model');
        $this->load->model('contract_model');
        $this->load->model('status_model');
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
        
        $data['contracts'] = $this->contract_model->get_all_contracts();
        
        $data['header'] = 'All Contracts';
        $data['page_title'] = 'All Contracts';
        $data['view'] = 'admin/contract/contract_view';
        $this->load->view('admin/application_view', $data);
	}
    
    public function create() {
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
        
        // get tasks
        $all_tasks = $this->task_model->get_all_tasks();
        $all_task_titles = [];
        foreach($all_tasks as $row) {
            $all_task_titles[$row['id']] = $row['title'];
        }
        $data['all_task_titles'] = $all_task_titles;
        
        // get offers
        $all_offers = $this->offer_model->get_all_offers();
        $all_offers_options = [];
        foreach($all_offers as $row) {
            $all_offers_options[$row['offer_id']] = '['.$row['offer_id'].']: ('.$row['offer_creator'].', $'.$row['offer_price'].') => ('.$row['task_creator'].', '.$row['title'].')';
        }
        $data['all_offers_options'] = $all_offers_options;
        
        // completion status
        $data['completion_status'] = array_merge([''=>'Please Select'], $this->status_model->get_all_statuses());
        
        $data['header'] = 'Create Contract';
        $data['page_title'] = 'Create Contract';
        $data['view'] = 'admin/contract/contract_create_view';
        $this->load->view('admin/application_view', $data);
    }
    
    public function update($contract_id = -1) {
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

        if (!$data['contract'] = $this->contract_model->get_contract_by_id($contract_id)) {
            redirect('admin/contract', 'refresh');
            return;
        }
        
        // get tasks
        $all_tasks = $this->task_model->get_all_tasks();
        $all_task_titles = [];
        foreach($all_tasks as $row) {
            $all_task_titles[$row['id']] = $row['title'];
        }
        $data['all_task_titles'] = $all_task_titles;
        
        // get offers
        $all_offers = $this->offer_model->get_all_offers();
        $all_offers_options = [];
        foreach($all_offers as $row) {
            $all_offers_options[$row['offer_id']] = '['.$row['offer_id'].']: ('.$row['offer_creator'].', $'.$row['offer_price'].') => ('.$row['task_creator'].', '.$row['title'].')';
        }
        $data['all_offers_options'] = $all_offers_options;
        
        // completion status
        $data['completion_status'] = array_merge([''=>'Please Select'], $this->status_model->get_all_statuses());
        
        $data['header'] = 'Create Contract';
        $data['page_title'] = 'Create Contract';
        $data['view'] = 'admin/contract/contract_update_view';
        $this->load->view('admin/application_view', $data);
    }
    
    public function delete() {
        
    }
    
    public function validate() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        $task_id = $this->input->post('task_id');
        
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('offer_id', 'Offer', "required|callback_ensure_corresponding_offer[$task_id]");
        $this->form_validation->set_rules('completion_status', 'Completion Status', 'required');
        
        $this->form_validation->set_message('ensure_corresponding_offer','Selected offer is not created for the selected task!');

        if (!$this->form_validation->run()) {
            $this->create();
            return;
        }
        
        $offer_id = $this->input->post('offer_id');
        $completion_status = $this->input->post('completion_status');
        $employer_id = $this->task_model->get_creator_id($task_id);
        $employee_id = $this->offer_model->get_acceptee_id($offer_id);

        if ($this->contract_model->create([$employer_id, $employee_id, $task_id, $offer_id, $completion_status])) {
            $this->success("created");
        } else {
            $this->failure("created");
        }
    }
    
    public function validate_update() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        $contract_id = $this->input->post('contract_id');
        $task_id = $this->input->post('task_id');
        
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('offer_id', 'Offer', "required|callback_ensure_corresponding_offer[$task_id]");
        $this->form_validation->set_rules('completion_status', 'Completion Status', 'required');
        
        $this->form_validation->set_message('ensure_corresponding_offer','Selected offer is not created for the selected task!');

        if (!$this->form_validation->run()) {
            $this->update($contract_id);
            return;
        }
        
        $offer_id = $this->input->post('offer_id');
        $completion_status = $this->input->post('completion_status');
        $employer_id = $this->task_model->get_creator_id($task_id);
        $employee_id = $this->offer_model->get_acceptee_id($offer_id);

        if ($this->contract_model->update_admin($contract_id, $employer_id, $employee_id, $task_id, $offer_id, $completion_status)) {
            $this->success("updated");
        } else {
            $this->failure("updated");
        }
    }
    
    public function success($action = 'ACTION_PERFORMED') {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['action_performed'] = $action;
        $data['view'] = 'admin/contract/contract_success_view';
        $this->load->view('admin/application_view', $data);
    }

    private function failure($action = 'ACTION_ATTEMPTED') {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['action_attempted'] = $action;
        $data['view'] = 'admin/contract/contract_failure_view';
        $this->load->view('admin/application_view', $data);
    }
    
    // callback for contract validate
    public function ensure_corresponding_offer($offer_id, $task_id) {
        return $this->offer_model->is_offered_for_task($offer_id, $task_id);
    }
}
?>
