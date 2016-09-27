<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
    }

	public function index() {
        // $data['header'] = 'Create Task';   
        // $data['view'] = 'task_create_view';
        // $data['page_title'] = 'Task';
        // $this->load->view('application_view', $data);
	}

    public function create() {
        $data['header'] = 'Create Task';   
        $data['view'] = 'task_create_view';
        $data['page_title'] = 'Task';
        $this->load->view('application_view', $data);
    }

    public function validate() {
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
            
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];
            $create_task_arr = [$user_id, $title, $description, $start_datetime, $end_datetime];

            if ($this->task_model->create($create_task_arr)) {
                $this->success();
            
            } else {
                $this->failure();
            }
        }
    }

    private function get_datetime($date, $time) {
        if (empty($time)) {
            return $date . ' ' . '00:00';
        } else {
            return $date . ' ' . $time;
        }
    }

    private function success() {
        $data['view'] = 'task_success_view';
        $this->load->view('application_view', $data);
    }

    private function failure() {
        $data['view'] = 'task_failure_view';
        $this->load->view('application_view', $data);
    }
}
?>
