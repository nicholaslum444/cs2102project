<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('offer_model');
		$this->load->model('status_model');
    }

	public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['user_id'] = $session_data['user_id'];
            $data['offers'] = $this->offer_model->get_offers_by_acceptee($session_data['user_id']);
            $data['header'] = 'My Pending Offers';   
            $data['view'] = 'offer_from_me_view';
            $data['page_title'] = 'My Offers';
            $this->load->view('application_view', $data);
        
        } else {
            redirect('login', 'refresh');
        }
	}

    public function view($task_id) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['offers'] = $this->offer_model->get_offers_for_task($task_id);
            $data['task'] = $this->task_model->get($task_id);
            $data['header'] = 'Offers For This Task';
            $data['view'] = 'offer_from_others_view';
            $data['page_title'] = 'Pending Offers';
            $this->load->view('application_view', $data);

        } else {
            redirect('login', 'refresh');
        }
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

                $data['header'] = 'Make An Offer';
                $data['view'] = 'offer_create_view';
                $data['page_title'] = 'Make An Offer';
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
         $session_data = $this->session->userdata('logged_in');
         $task_id = $this->input->post('id');

        if ($this->form_validation->run() === FALSE) {
            $this->create($task_id);

        } else {
            $user_id = $session_data['user_id'];
            $price = $this->input->post('price');

            $create_offer_arr = [$user_id, $task_id, $price];

            if ($this->offer_model->create($create_offer_arr)) {
                $this->success("created");

            } else {
                $this->failure("created");
            }
        }
    }

    public function validate_update() {
        $this->form_validation->set_rules('price', 'Price', 'required');
        $session_data = $this->session->userdata('logged_in');
        $offer_id = $this->input->post('id');

        if ($this->form_validation->run() === FALSE) {
            $this->update($offer_id);

        } else {
            $user_id = $session_data['user_id'];
            $price = $this->input->post('price');

            if ($this->offer_model->update($price, $offer_id, $user_id)) {
                $this->success("updated");

            } else {
                $this->failure("updated");
            }
        }
    }

    public function update($offer_id = -1) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            if ($data['offers'] = $this->offer_model->get($offer_id)) {
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
        } else {
            redirect('login', 'refresh');
        }
    }

    public function cancel($offer_id = -1) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $user_id = $session_data['user_id'];

            if ($this->offer_model->delete($user_id, $offer_id)) {
                $this->success("cancelled");

            } else {
                $this->failure("cancelled");
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    private function success($action = 'ACTION_PERFORMED') {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['action_performed'] = $action;
            $data['view'] = 'offer_success_view';
            $this->load->view('application_view', $data);
        }
        else {
        redirect('login', 'refresh');
        }
    }

    private function failure($action = 'ACTION_ATTEMPTED') {
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['action_attempted'] = $action;
            $data['view'] = 'offer_failure_view';
            $this->load->view('application_view', $data);
         }
        else {
        redirect('login', 'refresh');
        }
    }
}
?>
