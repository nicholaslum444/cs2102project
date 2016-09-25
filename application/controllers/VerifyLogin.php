<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('person_model');
	}

	public function index() {
        echo "Logging in... Please wait...";
        
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			//Field validation failed.  User redirected to login page
			$this->load->view('login_view');
		} else {
			//Go to private area
			redirect('', 'refresh');
		}
	}

	public function check_database($password) {
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$person = $this->person_model->login($username, $password);

		if($person) { // $person is not false if login is valid.
			$sess_array = [];
            $sess_array['id'] = $person->id;
            $sess_array['username'] = $person->username;        
            $this->session->set_userdata('logged_in', $sess_array);
			return TRUE;
            
		} else { // $person is false if login is NOT valid.
			$this->form_validation->set_message('check_database', 'Invalid username or password'.$result->length());
			return false;
		}
	}
}
?>
