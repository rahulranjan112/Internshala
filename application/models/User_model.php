<?php

class User_model extends CI_model{

    function create($formArray)
    {
        $this->db->insert('user',$formArray);    
        return $this->db->insert_id();
    }

    function getRecords()
    {
        return $users = $this->db->get('user')->result_array();
    }

    public function checkUser($email)
    {
        $this->db->where('Email',$email);
        return $row = $this->db->get('user')->row_array();
    }

    function authorized()
    {
        $user = $this->session->userdata('user');
        if (!empty($user)) {
            return true;
        } else {
            return false;
        }
    }
}

?>