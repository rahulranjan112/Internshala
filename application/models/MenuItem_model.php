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
    function getRecords()
    {
        return $menuitems = $this->db->get('menuitems')->result_array();
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
        return $menuitems = $query->result_array();
    }
}

?>