<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }
        $data['view'] = 'signup_view';
        $this->load->view('application_view', $data);
    }
    
    public function validate() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email[account.email]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[account.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('passwordconf', 'Confirm Password', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE) {
			// Field validation failed.  User redirected to signup page
            $this->index();
		} else {
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->account_model->create($email, $username, $password, ROLE_USER)) {
                // Go to success page
                $this->success();
            } else {
                // Something went wrong while adding.  User redirected to fail page
                $this->failure();
            }
		}
    }
    
    private function success() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }
        
        $data['view'] = 'signup_success_view';
        $this->load->view('application_view', $data);
    }
    
    private function failure() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }
        
        $data['view'] = 'signup_failure_view';
        $this->load->view('application_view', $data);
    }
 
}
?>
