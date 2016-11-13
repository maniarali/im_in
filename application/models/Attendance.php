<?php

class Attendance extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    function markIn($data){
        $this->db->insert('attendance', $data);
    }
    function markOut($data){
        $this->db->set('timeOut', $data['timeOut']);
    
        $array = array('userId' => $data['userId'], 'date' => $data['date']);
        $this->db->where($array);
        
        $this->db->update('attendance');
    }       
}
?>