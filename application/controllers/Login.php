<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
		$this->load->model('account_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->go_to_home($this->session->userdata('logged_in')['user_role']);
        }
        
        $data['view'] = 'login_view';
        $this->load->view('application_view', $data);
    }
    
    public function validate() {
        if ($this->session->userdata('logged_in')) {
            $this->go_to_home($this->session->userdata('logged_in')['user_role']);
        }

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			// Field validation failed.  User redirected to login page
            $this->index();
		} else {
			// Go to home
            $this->go_to_home($this->session->userdata('logged_in')['user_role']);
		}
    }

	public function check_database($password) {
        if ($this->session->userdata('logged_in')) {
            $this->go_to_home($this->session->userdata('logged_in')['user_role']);
        }
		// Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		// query the database
		$account = $this->account_model->login($username, $password);

		if($account) { // $account is not false if login is valid.
            $this->set_session($account);
			return TRUE;
            
		} else { // $account is false if login is NOT valid.
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
    
    private function go_to_home($role) {
        switch($role) {
            case ROLE_ADMIN :
                redirect('/admin', 'refresh');
                break;
                
            default :
                redirect('', 'refresh');
        }
    }
    
    private function set_session($account) {
        $sess_array = [];
        $sess_array['user_id'] = $account->id;
        $sess_array['username'] = $account->username;
        $sess_array['user_role'] = $account->role;
        $this->session->set_userdata('logged_in', $sess_array);
    }
 
}
?>
