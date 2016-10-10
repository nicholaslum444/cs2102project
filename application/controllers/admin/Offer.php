<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('offer_model');
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
        $data['offers'] = $this->offer_model->get_all_offers();
        
        $data['header'] = 'All Offers';
        $data['page_title'] = 'All Offers';
        $data['view'] = 'admin/offer_view';
        $this->load->view('admin/application_view', $data);
	}

    public function create($task_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        if ($data['tasks'] = $this->task_model->get($task_id)) {
            redirect('admin', 'refresh');
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

        $data['header'] = 'Make An Offer';
        $data['view'] = 'offer_create_view';
        $data['page_title'] = 'Make An Offer';
        $this->load->view('admin/application_view', $data);
        
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

    public function validate_update() {
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() === FALSE) {
            show_error('Please fill up the relevant fields!');

        } else {
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];
            $offer_id = $this->input->post('id');
            $price = $this->input->post('price');

            $update_offer_arr = [$price, $offer_id];

            if ($this->offer_model->update($update_offer_arr)) {
                $this->success();

            } else {
                $this->failure();
            }
        }
    }

    public function update($offer_id = -1) {
        if ($this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        if (!$data['offers'] = $this->offer_model->get($offer_id)) {
            redirect('admin/offer', 'refresh');
            return;
        }
        
        $start_datetime_arr = explode(" ",$data['offers']['start_datetime']);
        $end_datetime_arr = explode(" ", $data['offers']['end_datetime']);
        $data['offers']['start_date'] = $start_datetime_arr[0];
        $data['offers']['start_time'] = $start_datetime_arr[1];
        $data['offers']['end_date'] = $end_datetime_arr[0];
        $data['offers']['end_time'] = $end_datetime_arr[1];

        $data['header'] = 'Update Offer';   
        $data['view'] = 'offer_update_view';
        $data['page_title'] = 'Offer';
        $this->load->view('application_view', $data);
    }

    public function cancel($offer_id = -1) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $user_id = $session_data['user_id'];

        if ($this->offer_model->delete($user_id, $offer_id)) {
            $this->offer_delete_success();

        } else {
            $this->offer_delete_failure();
        }
    }

    private function success() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'offer_success_view';
        $this->load->view('application_view', $data);
    }

    private function failure() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'offer_failure_view';
        $this->load->view('application_view', $data);
    }

    private function offer_delete_success() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'offer_deleted_success_view';
        $this->load->view('application_view', $data);
    }

    private function offer_delete_failure() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['view'] = 'offer_deleted_failure_view';
        $this->load->view('application_view', $data);
    }
}
?>