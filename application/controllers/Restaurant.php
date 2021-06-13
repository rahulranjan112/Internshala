<?php

class Restaurant extends CI_Controller {

    function __construct()
	{
		parent::__construct();	// include above construction from CI_controller, otherwise will overwrite the constructor...
		if(!isset($_SESSION)) 
        {
            session_start();			
        }
		$this->load->model('User_model');
        $this->load->model('Restaurant_model');
        $this->load->model('MenuItem_model');
        $this->load->model('Order_model');
        $this->load->model('Customer_model');
        $this->load->model('OrderItems_model');
		$this->load->library('form_validation');
	}

    function index() {   
        //$this->load->model('User_model');
        if ($this->User_model->authorized() == false) {
            $this->session->set_flashdata('msg','You are not authorized to access this section');
            redirect(base_url().'index.php/user/login');
        }
        
        $user = $this->session->userdata('user');
        $restaurant = $this->Restaurant_model->get_data_by_id($user['ID']);
        $menuitems = $this->MenuItem_model->get_menuitems_by_restaurantid($restaurant['ID']);
        
        //$data['user'] = $user;
        $data = array(
            'user' => $user,
            'restaurant' => $restaurant,
            'menuitems' => $menuitems,
        );
        $this->load->view('restaurants/dashboard', $data);
    }

    function vieworders($restaurantID) {   
        //$this->load->model('User_model');
        if ($this->User_model->authorized() == false) {
            $this->session->set_flashdata('msg','You are not authorized to access this section');
            redirect(base_url().'index.php/user/login');
        }
        
        $user = $this->session->userdata('user');
        $order = $this->Order_model->get_orders_by_restaurantid($restaurantID);
        
        //$data['user'] = $user;
        $data = array(
            'user' => $user,
            'orders' => $order,
        );
        $this->load->view('restaurants/vieworders', $data);
    }

    function customerorders($orderid) {   
        //$this->load->model('User_model');
        if ($this->User_model->authorized() == false) {
            $this->session->set_flashdata('msg','You are not authorized to access this section');
            redirect(base_url().'index.php/user/login');
        }
        
        $user = $this->session->userdata('user');
        $order = $this->Order_model->get_data_by_id($orderid);
        $customer = $this->Customer_model->get_data_by_customerid($order['customer_id']);
        $orderitem = $this->OrderItems_model->get_orderitems_by_orderid($orderid);
        
        //$data['user'] = $user;
        $data = array(
            'user' => $user,
            'orders' => $order,
            'orderitems' => $orderitem,
            'customer' => $customer,
        );
        $this->load->view('restaurants/customerorders', $data);
    }

    public function register() {
        //error_log('Inside register');
		//$this->load->model('User_model');
        //$this->load->model('Restaurant_model');

		if ($this->User_model->authorized() == true) {
            echo 'Yes';
            redirect(base_url().'index.php/restaurant/index');
        }

		//$this->load->library('form_validation');

		$this->form_validation->set_message('is_unique', 'Email address already exist, please try another.');

        $this->form_validation->set_rules('preference','Preference','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required');
        
		//if ($this->form_validation->run() == false){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->load->view('restaurants/register');
		} else {		
            
			$formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = md5($this->input->post('password'));
            $formArray['iscustomer'] = 0;

            $user_id = $this->User_model->create($formArray);

            $restaurantArray = array();
            $restaurantArray['name'] = $this->input->post('name');
            $restaurantArray['address'] = $this->input->post('address');
            $restaurantArray['mobileno'] = $this->input->post('mobileno');
            $restaurantArray['opening_time'] = $this->input->post('opening_time');
            $restaurantArray['closing_time'] = $this->input->post('closing_time');
            $restaurantArray['user_id'] = $user_id;

            $this->Restaurant_model->create($restaurantArray);
            //var_dump($formArray);
            //var_dump($restaurantArray);
			$this->session->set_flashdata('msg','Your account has been created successfully!');
            redirect(base_url().'index.php/restaurant/register');
		}		
	}

    function logout() {    
        $user = $this->session->unset_userdata('user');
        session_destroy();
        redirect(base_url().'index.php/user/login');
    }

}

?>