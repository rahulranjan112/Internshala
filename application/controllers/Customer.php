<?php

class Customer extends CI_Controller {

    function __construct()
	{
		parent::__construct();	// include above construction from CI_controller, otherwise will overwrite the constructor...
		if(!isset($_SESSION)) 
        {
            session_start();			
        }
		$this->load->model('User_model');
        $this->load->model('Customer_model');
        $this->load->model('MenuItem_model');
		$this->load->library('form_validation');
	}

    function index() {   
        //$this->load->model('User_model');
        if ($this->User_model->authorized() == false) {
            $this->session->set_flashdata('msg','You are not authorized to access this section');
            redirect(base_url().'index.php/user/login');
        }
        
        $user = $this->session->userdata('user');
        $customer = $this->Customer_model->get_data_by_id($user['ID']);
        $menuitems = $this->MenuItem_model->get_menuitems_customer();
        
        //$data['user'] = $user;
        $data = array(
            'user' => $user,
            'customer' => $customer,
            'menuitems' => $menuitems,
        );
        $this->load->view('customers/dashboard', $data);
    }

    public function register() {
		//$this->load->model('User_model');
        //$this->load->model('Customer_model');

		if ($this->User_model->authorized() == true) {
            redirect(base_url().'index.php/customer/index');
        }

		//$this->load->library('form_validation');

		$this->form_validation->set_message('is_unique', 'Email address already exist, please try another.');

        $this->form_validation->set_rules('preference','Preference','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required');

		//if ($this->form_validation->run() == false){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->load->view('customers\register');
		} else {		

			$formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = md5($this->input->post('password'));
            $formArray['iscustomer'] = 1;

            $user_id = $this->User_model->create($formArray);

            $customerArray = array();
            $customerArray['name'] = $this->input->post('name');
            $customerArray['address'] = $this->input->post('address');
            $customerArray['mobileno'] = $this->input->post('mobileno');
            $customerArray['preference'] = $this->input->post('preference');
            $customerArray['user_id'] = $user_id;

            $this->Customer_model->create($customerArray);

			$this->session->set_flashdata('msg','Your account has been created successfully!');
            redirect(base_url().'index.php/customer/register');
		}		
	}

    function logout() {    
        $user = $this->session->unset_userdata('user');
        session_destroy();
        redirect( uri: base_url().'index.php/user/login');
    }

}

?>