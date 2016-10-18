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
        $data['view'] = 'admin/task/task_view';
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
        $data['page_title'] = 'Create Task';
        $data['view'] = 'admin/task/task_create_view';
        $this->load->view('admin/application_view', $data);
    }

    // Check that creator_id is updating this task
    public function update($task_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        
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

        $data['header'] = 'Update Task';   
        $data['page_title'] = 'Update Task';
        $data['view'] = 'admin/task/task_update_view';
        $this->load->view('admin/application_view', $data);
    }

    // Check that creator_id is deleting this task
    public function delete($task_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $user_id = $session_data['user_id'];

        if ($this->task_model->delete_admin($task_id)) {
            $this->success('deleted');

        } else {
            $this->failure('deleted');
        }
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
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required|callback_checkYear');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required|callback_compareDateTime');
        $this->form_validation->set_rules('start_time', 'Starting Time', 'required');
        $this->form_validation->set_rules('end_time', 'Ending Time', 'required');
        $this->form_validation->set_rules('creator_id', 'Creator', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
            return;
        }
        
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
        $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
        $creator_id = $this->input->post('creator_id');

        $create_task_arr = [$creator_id, $title, $description, $start_datetime, $end_datetime];

        if ($this->task_model->create($create_task_arr)) {
            $this->success("created");
            return;
        }
        $this->failure();
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
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required|callback_checkYear');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required|callback_compareDateTime');
        $this->form_validation->set_rules('start_time', 'Starting Time', 'required');
        $this->form_validation->set_rules('end_time', 'Ending Time', 'required');
        $this->form_validation->set_rules('creator_id', 'Creator ID', 'required');

        if (!$this->form_validation->run()) {
            $this->update();
            return;
        }
        
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
        $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
        $creator_id = $this->input->post('creator_id');
        $id = $this->input->post('id');

        $update_task_arr = [$title, $description, $start_datetime, $end_datetime, $creator_id, $id];

        if ($this->task_model->update_admin($update_task_arr)) {
            $this->success("updated");
        }
        
        $this->failure();
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

    private function success($action = 'ACTION_PERFORMED') {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['action_performed'] = $action;
        $data['view'] = 'admin/task/task_success_view';
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
        $data['view'] = 'admin/task/task_failure_view';
        $this->load->view('admin/application_view', $data);
    }

    public function checkYear() {
        $start_date = $this->input->post('start_date');
        if(!empty($start_date) && $start_date < 2016) {
             $this->form_validation->set_message('checkYear','Your start date must be 2016');
                return false;
        }
        else
            return true;
    }

    public function compareDateTime() {
        $start_date = $this->input->post('start_date');
        $start_time = $this->input->post('start_time');
        $end_date = $this->input->post('end_date');
        $end_time = $this->input->post('end_time');

        if(!empty($end_date)) {
            if($start_date > $end_date) {
                $this->form_validation->set_message('compareDateTime','Your end date must be later than your start date.');
                return false;
            }
            if(!empty($start_time) && !empty($end_time)) {
                if ($start_date == $end_date && $start_time > $end_time) {
                    $this->form_validation->set_message('compareDateTime','Your start time must be earlier than your end time.');
                    return false;
            }
                elseif ($start_date == $end_date && $start_time == $end_time) {
                    $this->form_validation->set_message('compareDateTime','Your start time must not be the same as the end time.');
                    return false;
                }
            }
                return true;
        }
    }
}
?>
