<?php

class Attendance extends CI_Model{
    function __construct() {
        parent::__construct();
    }

	function check_today_record($id = NULL)
	{
		if (!$id)
			return NULL;
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where('attendance',array('userId' => $id, 'date' => date('Y-m-d')));
		$result = $query->row();
		return $result;
	}

    function markIn($data){
        return $this->db->insert('attendance', $data);
    }
    function markOut($data){
        $this->db->set('timeOut', $data['timeOut']);
    
        $array = array('userId' => $data['userId'], 'date' => $data['date']);
        $this->db->where($array);
        
        return $this->db->update('attendance');
    }       
}
?>