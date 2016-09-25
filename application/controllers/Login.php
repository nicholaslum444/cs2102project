<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('home', 'refresh');
        } else {
            $data['view'] = 'login_view';
            $this->load->view('application_view', $data);
        }
    }
 
}
