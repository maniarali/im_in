<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    function check($email = NULL)
	{
		if (!$email)
			return NULL;
        $query = $this->db->get_where('user',array('email' => $email));
		$result = $query->row();
		return $result;
    }
    function getEditUser($id = NULL)
	{
		if (!$id)
			return NULL;
        $query = $this->db->get_where('user',array('id' => $id));
		$result = $query->row();
		return $result;
    }


    function register($data = NULL)
	{
		if (!$data)
			return NULL;
        return $this->db->insert('user', $data);
    }
    function edit($data = NULL,$id)
	{
		if (!$data)
			return NULL;
        $this->db->set($data);
        $this->db->where('id' , $id);
        return $this->db->update('user');
    }
    
    function listEmployees_count()
    {   
        $this->db->where('role !=', 'admin');
        $result = $this->db->get('user');
        return $result->num_rows();
    }
    function listEmployees($limit, $start)
    {   
        $this->db->limit($limit, $start);
        $this->db->select('id, fullName, email, role, status');
        $this->db->where('role !=', 'admin');
        $query = $this->db->get('user');
        $result = $query->result();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $result;
        }
        return false;

    }

    // function listEmployees()
    // {   
    //     $this->db->select('id, fullName, email, role, status');
    //     $this->db->where('role !=', 'admin');
    //     $query = $this->db->get('user');
    //     $result = $query->result();
    //     return $result;
    // }
    
    function delete($id,$newStatus)
    {
        $this->db->set('status', $newStatus);
        $this->db->where('id' , $id);
        
        return $this->db->update('user');
    }
    function password($id,$password)
    {
        $this->db->set('password', $password);
        $this->db->where('id' , $id);
        
        return $this->db->update('user');
    }

}
?>