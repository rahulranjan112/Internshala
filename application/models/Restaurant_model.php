<?php

class Restaurant_model extends CI_model{

    function create($formArray)
    {
        $this->db->insert('restaurant',$formArray);
    }

    function getRecords()
    {
        return $restaurants = $this->db->get('restaurant')->result_array();
    }

    function get_data_by_id($id='0')
    {
        $this->db->where('User_ID', $id);
        return $row = $this->db->get('restaurant')->row_array();
    }

    public function checkrestaurant($email)
    {
        $this->db->where('Email',$email);
        return $row = $this->db->get('restaurant')->row_array();
    }

    function authorized()
    {
        $restaurant = $this->session->restaurantdata('restaurant');
        if (!empty($restaurant)) {
            return true;
        } else {
            return false;
        }
    }
}

?>