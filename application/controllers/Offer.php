<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('offer_model');
    }

	public function index() {
        // if ($this->session->userdata('logged_in')) {
        //     $session_data = $this->session->userdata('logged_in');
        //     $data['username'] = $session_data['username'];
        //     $data['user_id'] = $session_data['user_id'];
        //     $data['tasks'] = $this->task_model->get_user_tasks($session_data['user_id']);
        //     $data['header'] = 'NUSMaids Home';
            
        //     $data['view'] = 'home_view';
        //     $data['page_title'] = 'Home';
        //     $this->load->view('application_view', $data);
            
        // } else {
        //     redirect('login', 'refresh');
        // }
	}

    public function create($task_id) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            if ($data['tasks'] = $this->task_model->get($task_id)) {
                // Set start and end date and time input fields 
                // in data array
                $start_datetime_arr = explode(" ",$data['tasks']['start_datetime']);
                $end_datetime_arr = explode(" ", $data['tasks']['end_datetime']);
                $data['tasks']['start_date'] = $start_datetime_arr[0];
                $data['tasks']['start_time'] = $start_datetime_arr[1];
                $data['tasks']['end_date'] = $end_datetime_arr[0];
                $data['tasks']['end_time'] = $end_datetime_arr[1];

                $data['header'] = 'Offer Details';   
                $data['view'] = 'offer_create_view';
                $data['page_title'] = 'Offer Details';
                $this->load->view('application_view', $data);
            
            } else {
                redirect('login', 'refresh');
            }
            
        } else {
            redirect('login', 'refresh');
        }
    }

    public function validate() {
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() === FALSE) {
            show_error('Please fill up the relevant fields!');

        } else {
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];
            $task_id = $this->input->post('id');
            $price = $this->input->post('price');

            $create_offer_arr = [$user_id, $task_id, $price];

            if ($this->offer_model->create($create_offer_arr)) {
                $this->success();

            } else {
                $this->failure();
            }
        }
    }

    public function cancel($task_id) {

    }

    private function success() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['view'] = 'offer_success_view';
            $this->load->view('application_view', $data);
        }
        else {
        redirect('login', 'refresh');
        }
    }

    private function failure() {
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['view'] = 'offer_failure_view';
            $this->load->view('application_view', $data);
         }
        else {
        redirect('login', 'refresh');
        }
    }
}
?>
