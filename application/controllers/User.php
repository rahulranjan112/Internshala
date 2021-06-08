<?php

class User extends CI_Controller {

    function index() {
        
        $users = $this->User_model->getRecords();
        $data = array();
        $data['users'] = $users;
        $this->load->view('users\list', $data);
    }

    function __construct()
	{
		parent::__construct();	// include above construction from CI_controller, otherwise will overwrite the constructor...
		if(!isset($_SESSION)) 
        {
            session_start();			
        }
		$this->load->model('User_model');
        $this->load->model('Customer_model');
		$this->load->library('form_validation');
	}	

    function create() {        
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == false){
            $this->load->view('users\create');
        } else {
            //Save record to database

            $formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = $this->input->post('password');

            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully!');
            redirect(base_url().'index.php/user/index');
        }        
    }
    public function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
    public function login() {
		//$this->load->model('User_model');

		if ($this->User_model->authorized() == true) {
            redirect(base_url().'index.php/customer/index');
        }

		//$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() == false){			
			$this->load->view('users\login');
		} else {
			//Save record to database
			$email = $this->input->post('email');			
			$user = $this->User_model->checkUser($email);

			if(!empty($user)) {
				//$password = $this->input->post('password');
				$password = md5($this->input->post('password'));				

				if ( $password == $user['Password']) {
					//debug_to_console("YESSS");
					$this->load->library('session');					
					$this->session->set_flashdata('msg','login');
					$sessArr['ID'] = $user['ID'];
					$sessArr['Email'] = $user['Email'];
					$sessArr['IsCustomer'] = $user['IsCustomer'];
					//$sessArr['Name'] = $this->Customer_model->get_data_by_id($user['ID']);
					$this->session->set_userdata('user', $sessArr);
					//echo $this->session->userdata('user')['Email'];

					if($user['IsCustomer']==true){
						redirect( uri: base_url().'index.php/customer/index');
					} else {
						redirect( uri: base_url().'index.php/restaurant/index');
					}				
				} else {
					//$value = "Password:" . $password . " DB Entry: " . $user['Password'];
					$this->session->set_flashdata('msg', 'Either email or password is incorrect, please try again.');
            		redirect(base_url().'index.php/user/login');
				}

			} else {
				$this->session->set_flashdata('msg','Either email or password is incorrect, please try again.');
            	redirect(base_url().'index.php/user/login');
			}
		}        
    }
}

?>