<?php

class Customer_model extends CI_model{

    function create($formArray)
    {
        $this->db->insert('customer',$formArray);
    }

    function getRecords()
    {
        return $customers = $this->db->get('customer')->result_array();
    }
    function get_data_by_customerid($customerid='0')
    {
        $this->db->where('ID', $customerid);
        return $row = $this->db->get('customer')->row_array();
    }
    function get_data_by_id($userid='0')
    {
        $this->db->where('User_ID', $userid);
        return $row = $this->db->get('customer')->row_array();
    }
    
    public function checkcustomer($email)
    {
        $this->db->where('Email',$email);
        return $row = $this->db->get('customer')->row_array();
    }

    function authorized()
    {
        $customer = $this->session->customerdata('customer');
        if (!empty($customer)) {
            return true;
        } else {
            return false;
        }
    }
}

?>