<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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
        
        $data['tasks'] = $this->task_model->get_all_tasks($session_data['user_id']);
        
        $data['header'] = 'All Tasks';
        $data['page_title'] = 'All Tasks';
        $data['view'] = 'admin/task_view';
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
        
        $data['all_usernames'] = $this->account_model->get_all_usernames();
        
        $data['user_id'] = $session_data['user_id'];
        $data['username'] = $session_data['username'];
        $data['header'] = 'Create A Task';   
        $data['view'] = 'admin/task_create_view';
        $data['page_title'] = 'Create Task';
        $this->load->view('admin/application_view', $data);
    }

    // Check that start_datetime <= end_datetime
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
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required');
        $this->form_validation->set_rules('creator_id', 'Creator ID', 'required');

        if ($this->form_validation->run() === FALSE) {
            show_error('Please fill up the relevant fields!');
            return;
        }
        
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
        $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
        $creator_id = $this->input->post('creator_id');
        
        $user_id = $session_data['user_id'];

        $create_task_arr = [$user_id, $title, $description, $start_datetime, $end_datetime];

        if ($this->task_model->create($create_task_arr)) {
            $this->success();
            return;
        }
        $this->failure();
    }

    public function validate_update() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            show_error('Please fill up the relevant fields!');

        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
            $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
            $id = $this->input->post('id');

            $update_task_arr = [$title, $description, $start_datetime, $end_datetime, $id];

            if ($this->task_model->update($update_task_arr)) {
                $this->update_success();
            
            } else {
                $this->update_failure();
            }
        }
    }

    // Check that creator_id is updating this task
    public function update($task_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        if (!$data['tasks'] = $this->task_model->get($task_id)) {
            redirect('task', 'refresh');
            return;
        }
        
        // Set start and end date and time input fields 
        // in data array
        $start_datetime_arr = explode(" ",$data['tasks']['start_datetime']);
        $end_datetime_arr = explode(" ", $data['tasks']['end_datetime']);
        $data['tasks']['start_date'] = $start_datetime_arr[0];
        $data['tasks']['start_time'] = $start_datetime_arr[1];
        $data['tasks']['end_date'] = $end_datetime_arr[0];
        $data['tasks']['end_time'] = $end_datetime_arr[1];

        $data['header'] = 'Update Task';   
        $data['view'] = 'task_update_view';
        $data['page_title'] = 'Task';
        $this->load->view('application_view', $data);
    }

    // Check that creator_id is deleting this task
    public function delete($task_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $user_id = $session_data['user_id'];

        if ($this->task_model->delete($user_id, $task_id)) {
            $this->delete_success();

        } else {
            $this->delete_failure();
        }
    }

    public function available() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $user_id = $session_data['user_id'];
        $data['available_tasks'] = $this->task_model->get_available_tasks($user_id);

        $data['header'] = 'NUSMaids Available Tasks';
        $data['view'] = 'task_available_view';
        $data['page_title'] = 'Available Tasks';
        $this->load->view('application_view', $data);
    }

    private function get_datetime($date, $time) {
        if (empty($time)) {
            return $date . ' ' . '00:00';
        } else {
            return $date . ' ' . $time;
        }
    }

    private function success() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'task_success_view';
        $this->load->view('application_view', $data);
    }

    private function update_success() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'task_update_success_view';
        $this->load->view('application_view', $data);
    }

    private function delete_success() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
    
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'task_delete_success_view';
        $this->load->view('application_view', $data);
    }

    private function failure() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['view'] = 'task_failure_view';
        $this->load->view('application_view', $data);
    }

    private function update_failure() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }

        $session_data = $this->session->userdata('logged_in');
        $data['view'] = 'task_update_failure_view';
        $this->load->view('application_view', $data);
    }

    private function delete_failure() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }

        $session_data = $this->session->userdata('logged_in');
        $data['view'] = 'task_delete_failure_view';
        $this->load->view('application_view', $data);
    }
}
?>