<?php

class MenuItem extends CI_Controller {

    function index() {
        
        
    }

    function __construct()
	{
		parent::__construct();	// include above construction from CI_controller, otherwise will overwrite the constructor...
		if(!isset($_SESSION)) 
        {
            session_start();			
        }
		$this->load->model('MenuItem_model');
		$this->load->model('Restaurant_model');
		$this->load->library('form_validation');
	}	

    function create() {        
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->load->view('menuitems\create');
        } else {
            //Save record to database
			$user = $this->session->userdata('user');
        	$restaurant = $this->Restaurant_model->get_data_by_id($user['ID']);

            $formArray = array();
            $formArray['item'] = $this->input->post('item');
            $formArray['description'] = $this->input->post('description');
			$formArray['cost'] = $this->input->post('cost');
            $formArray['restaurant_id'] = $restaurant['ID'];//$this->input->post('restaurant_id');
			$formArray['imagelocation'] = $this->input->post('imagelocation');
            $formArray['itemavailable'] = $this->input->post('itemavailable');
			$formArray['isvegetarian'] = $this->input->post('isvegetarian');
            $formArray['course'] = $this->input->post('course');

            $this->MenuItem_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully!');
            redirect(base_url().'index.php/restaurant/index');
        }        
    }

    function edit($id) {
        $menuitem = $this->MenuItem_model->get_data_by_id($id);
        $data = array();
        $data['menuitem'] = $menuitem;

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {      
            $this->load->view('menuitems\edit', $data);
        } else {
            //Update record to database
            $formArray = array();
            $formArray['item'] = $this->input->post('item');
            $formArray['description'] = $this->input->post('description');
			$formArray['cost'] = $this->input->post('cost');
            //$formArray['restaurant_id'] = $restaurant['ID'];//$this->input->post('restaurant_id');
			$formArray['imagelocation'] = $this->input->post('imagelocation');
            $formArray['itemavailable'] = $this->input->post('itemavailable');
			$formArray['isvegetarian'] = $this->input->post('isvegetarian');
            $formArray['course'] = $this->input->post('course');

            $this->MenuItem_model->update($id, $formArray);
            $this->session->set_flashdata('success','Record updated successfully!');
            redirect(base_url().'index.php/restaurant/index');
        } 

    }

    function delete($id) {
        $menuitem = $this->MenuItem_model->get_data_by_id($id);
        if (empty($menuitem)) {
            $this->session->set_flashdata('failure','Record not found in database successfully!');
            redirect(base_url().'index.php/restaurant/index');
        }

        $this->MenuItem_model->delete($id);
        $this->session->set_flashdata('success','Record deleted successfully!');
        redirect(base_url().'index.php/restaurant/index');
    }
}

?>