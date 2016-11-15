<?php

class Attendance extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    function markIn($data){
        $this->db->insert('user', $data);
    }
          
}
?>