<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_model extends CI_Model{
    public function GetAllPartner(){
        $data = $this->db->query("SELECT * FROM partner");
        return $data->result_array();
    }
}
?>