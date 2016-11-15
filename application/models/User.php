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

    function register($data = NULL)
	{
		if (!$data)
			return NULL;
        return $this->db->insert('user', $data);
    }

}
?>