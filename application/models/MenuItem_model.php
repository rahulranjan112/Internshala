<?php

class MenuItem_model extends CI_model{

    function create($formArray)
    {
        $this->db->insert('menuitems',$formArray);
    }
    function update($id, $formArray)
    {
        $this->db->where('ID', $id);
        $this->db->update('menuitems',$formArray);
    }
    function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('menuitems');
    }
    function get_menuitems_customer()
    {
        $this->db->select('menuitems.*,restaurant.Name');
        $this->db->from('menuitems');
        $this->db->join('restaurant', 'menuitems.Restaurant_ID = restaurant.id');
        $this->db->where('menuitems.ItemAvailable', 1);
        $query = $this->db->get();
        return $menuitems = $query->result_array();
        //return $menuitems = $this->db->get('menuitems')->result_array();
    }
    function get_data_by_id($id='0')
    {
        $this->db->where('ID', $id);
        return $row = $this->db->get('menuitems')->row_array();
    }
    function get_menuitems_by_restaurantid($id='0')
    {    
        $this->db->where('Restaurant_ID', $id);
        //$this->db->from('menuitems');  
        $query = $this->db->get('menuitems');
        if($query->num_rows() != 0) {            
            return $menuitems = $query->result_array();
        } else {
            return 0;
        }
    }
}

?>