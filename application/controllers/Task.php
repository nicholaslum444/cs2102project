<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('category_model');
    }

	public function index() {
        // $data['header'] = 'Create Task';   
        // $data['view'] = 'task_create_view';
        // $data['page_title'] = 'Task';
        // $this->load->view('application_view', $data);
	}

    public function create() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['all_categories'] = array_merge([''=>'Please Select'], $this->category_model->get_all_categories());
            $data['username'] = $session_data['username'];
            $data['header'] = 'Create Your Task';   
            $data['view'] = 'task_create_view';
            $data['page_title'] = 'Task';
            $this->load->view('application_view', $data);
        }
        else {
            redirect('login', 'refresh');
        }
    }

    // Check that start_datetime <= end_datetime
    public function validate() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required|callback_checkYear');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required|callback_compareDateTime');
        $this->form_validation->set_rules('start_time', 'Starting Time', 'required');
        $this->form_validation->set_rules('end_time', 'Ending Time', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();

        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
            $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
            $category = $this->input->post('category');
            $price = $this->input->post('price');
            
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];

            $create_task_arr = [$user_id, $title, $description, $start_datetime, $end_datetime, $category, $price];

            if ($this->task_model->create($create_task_arr)) {
                $this->success("created");
            
            } else {
                $this->failure("created");
            }
        }
    }

    public function validate_update() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Starting Date', 'required|callback_checkYear');
        $this->form_validation->set_rules('end_date', 'Ending Date', 'required|callback_compareDateTime');
        $this->form_validation->set_rules('start_time', 'Starting Time', 'required');
        $this->form_validation->set_rules('end_time', 'Ending Time', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        $session_data = $this->session->userdata('logged_in');
        $user_id = $session_data['user_id'];
        $id = $this->input->post('id');
        if ($this->form_validation->run() === FALSE) {
            $this->update($id);

        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $start_datetime = $this->get_datetime($this->input->post('start_date'), $this->input->post('start_time'));
            $end_datetime = $this->get_datetime($this->input->post('end_date'), $this->input->post('end_time'));
            $category = $this->input->post('category');
            $price = $this->input->post('price');
 
            $update_task_arr = [$title, $description, $start_datetime, $end_datetime, $category, $price, $id, $user_id];

            if ($this->task_model->update($update_task_arr)) {
                $this->success("updated");
            
            } else {
                $this->failure("updated");
            }
        }
    }

    // Check that creator_id is updating this task
    public function update($task_id) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            if ($data['tasks'] = $this->task_model->get($task_id)) {
                // Set start and end date and time input fields 
                // in data array
                $data['all_categories'] = array_merge([''=>'Please Select'], $this->category_model->get_all_categories());
                $start_datetime_arr = explode(" ",$data['tasks']['start_datetime']);
                $end_datetime_arr = explode(" ", $data['tasks']['end_datetime']);
                $data['tasks']['start_date'] = $start_datetime_arr[0];
                $data['tasks']['start_time'] = $start_datetime_arr[1];
                $data['tasks']['end_date'] = $end_datetime_arr[0];
                $data['tasks']['end_time'] = $end_datetime_arr[1];

                $data['header'] = 'Update My Task';   
                $data['view'] = 'task_update_view';
                $data['page_title'] = 'Task';
                $this->load->view('application_view', $data);
            
            } else {
                redirect('login', 'refresh');
            }

        } else {
            redirect('login', 'refresh');
        }
    }

    // Check that creator_id is deleting this task
    public function delete($task_id) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];

            if ($this->task_model->delete($user_id, $task_id, $user_id)) {
                $this->success("deleted");

            } else {
                $this->failure("deleted");
            }

        } else {
            redirect('login', 'refresh');
        }
    }

    public function available() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
            return;
        }
        
        $search_in_options = ['All Fields', 'Title &amp; Description', 'Task Creator'];
        
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $user_id = $session_data['user_id'];
        
        $search_term = html_escape($this->input->post('search_term'));
        $search_in = $this->input->post('search_in');
        $search_start_date = $this->input->post('start_date');
        $search_start_time = $this->input->post('start_time');
        $search_end_date = $this->input->post('end_date');
        $search_end_time = $this->input->post('end_time');
        
        // if no value then is defaults to 0
        // $search_in logic is 
            // 0=search all, 
            // 1=search title/desc only, 
            // 2=search username only
        $search_in = $search_in ? $search_in : 0;
        
        // to get values for start and end, then search them
        // either build another search query of use the same query
        // but if same query then the logic will be very big
        
        
        $data['search_term'] = $search_term;
        $data['search_in_options'] = $search_in_options;
        $data['search_in'] = $search_in;
        
        $data['available_tasks'] = $this->task_model->search_available_tasks($user_id, $search_term, $search_in);

        $data['header'] = 'NUSMaids Available Tasks';
        $data['view'] = 'task_available_view';
        $data['page_title'] = 'Available Tasks';
        $this->load->view('application_view', $data);

    }

    private function get_datetime($date, $time) {
        if (empty($time)) {
            return $date . ' ' . '00:00';
        } else {
            return $date . ' ' . $time;
        }
    }

    public function checkYear() {
        $start_date = $this->input->post('start_date');
        if(!empty($start_date) && $start_date < 2016) {
             $this->form_validation->set_message('checkYear','Your start date must be 2016');
                return false;
        }
        else
            return true;
    }

    public function compareDateTime() {
        $start_date = $this->input->post('start_date');
        $start_time = $this->input->post('start_time');
        $end_date = $this->input->post('end_date');
        $end_time = $this->input->post('end_time');

        if(!empty($end_date)) {
            if($start_date > $end_date) {
                $this->form_validation->set_message('compareDateTime','Your end date must be later than your start date.');
                return false;
            }
            if(!empty($start_time) && !empty($end_time)) {
                if ($start_date == $end_date && $start_time > $end_time) {
                    $this->form_validation->set_message('compareDateTime','Your start time must be earlier than your end time.');
                    return false;
            }
                elseif ($start_date == $end_date && $start_time == $end_time) {
                    $this->form_validation->set_message('compareDateTime','Your start time must not be the same as the end time.');
                    return false;
                }
            }
                return true;
        }
    }

    private function convert_int_to_category($category) {
        switch ($category) {
            case 1:
                return 'DELIVERY';
                break;

            case 2:
                return 'CLEANING';
                break;

            case 3:
                return 'HANDYMAN';
                break;

            case 4:
                return 'MOVING';
                break;
            
            default:
                return 'DELIVERY';
                break;
        }
    }

    private function success($action = 'ACTION_PERFORMED') {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['action_performed'] = $action;
            $data['view'] = 'task_success_view';
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
            $data['view'] = 'task_failure_view';
            $this->load->view('application_view', $data);
         }
        else {
        redirect('login', 'refresh');
        }
    }
}
?>
