<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
		$this->load->model('person_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }
        $data['view'] = 'login_view';
        $this->load->view('application_view', $data);
    }
    
    public function validate() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			// Field validation failed.  User redirected to login page
            $this->index();
		} else {
			// Go to home
			redirect('', 'refresh');
		}
    }

	public function check_database($password) {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        }
		// Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		// query the database
		$person = $this->person_model->login($username, $password);

		if($person) { // $person is not false if login is valid.
            $this->set_session($person);
			return TRUE;
            
		} else { // $person is false if login is NOT valid.
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
    
    private function set_session($person) {
        $sess_array = [];
        $sess_array['user_id'] = $person->id;
        $sess_array['username'] = $person->username;        
        $this->session->set_userdata('logged_in', $sess_array);
    }
 
}
?>