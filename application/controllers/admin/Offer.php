<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
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
        $data['view'] = 'admin/offer/offer_view';
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
        
        $all_tasks = $this->task_model->get_all_tasks();
        $all_task_titles = [];
        foreach($all_tasks as $row) {
            $all_task_titles[$row['id']] = $row['title'];
        }
        
        $data['all_task_titles'] = $all_task_titles;
        $data['all_usernames'] = $this->account_model->get_all_usernames();
        
        $data['header'] = 'Make An Offer';
        $data['view'] = 'admin/offer/offer_create_view';
        $data['page_title'] = 'Make An Offer';
        $this->load->view('admin/application_view', $data);
    }

    public function update($offer_id = -1) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $session_data = $this->session->userdata('logged_in');
        
        if ($session_data['user_role'] != ROLE_ADMIN) {
            redirect('home', 'refresh');
            return;
        }
        
        $data['offer'] = $this->offer_model->get($offer_id);

        if (!$data['offer']) {
            redirect('admin/offer', 'refresh');
            return;
        }
        
        $start_datetime_arr = explode(" ",$data['offer']['start_datetime']);
        $end_datetime_arr = explode(" ", $data['offer']['end_datetime']);
        $data['offer']['start_date'] = $start_datetime_arr[0];
        $data['offer']['start_time'] = $start_datetime_arr[1];
        $data['offer']['end_date'] = $end_datetime_arr[0];
        $data['offer']['end_time'] = $end_datetime_arr[1];
        
        $all_tasks = $this->task_model->get_all_tasks();
        $all_task_titles = [];
        foreach($all_tasks as $row) {
            $all_task_titles[$row['id']] = $row['title'];
        }
        
        $data['all_task_titles'] = $all_task_titles;
        $data['all_usernames'] = $this->account_model->get_all_usernames();
        
        $data['username'] = $session_data['username'];
        $data['header'] = 'Update Offer';   
        $data['view'] = 'admin/offer/offer_update_view';
        $data['page_title'] = 'Offer';
        $this->load->view('admin/application_view', $data);
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
            $this->success("cancelled");

        } else {
            $this->failure("cancelled");
        }
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
        
        $this->form_validation->set_rules('price', 'Price', 'numeric|required|greater_than[0]');

        if (!$this->form_validation->run()) {
            $this->update();
            return;
        }
        
        $task_id = $this->input->post('task_id');
        $price = $this->input->post('price');
        $creator_id = $this->input->post('creator_id');

        if ($this->offer_model->create([$creator_id, $task_id, $price])) {
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
        
        $this->form_validation->set_rules('price', 'Price', 'numeric|required|greater_than[0]');

        if (!$this->form_validation->run()) {
            $this->update();
            return;
        }
        
        $offer_id = $this->input->post('offer_id');
        $task_id = $this->input->post('task_id');
        $price = $this->input->post('price');
        $creator_id = $this->input->post('creator_id');

        if ($this->offer_model->update_admin($offer_id, $price, $task_id, $creator_id)) {
            $this->success("updated");
        } else {
            $this->failure("updated");
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
        $data['view'] = 'admin/offer/offer_success_view';
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
        $data['view'] = 'admin/offer/offer_failure_view';
        $this->load->view('admin/application_view', $data);
    }
}
?>
