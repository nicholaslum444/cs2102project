<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
        $data['tasks'] = $this->task_model->get_tasks();
        $data['title'] = 'Hello World CS2102 Project';
		$this->load->view('welcome_message', $data);
	}
}
