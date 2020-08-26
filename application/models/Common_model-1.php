<?php
class Common_model extends CI_Model {

public $title;
public $content;
public $date;

public function get_last_ten_entries()
{
        $query = $this->db->get('entries', 10);
        return $query->result();
}

function get_users(){

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id',1);
    $result = $this->db->get();
    return $result->result();

}

}