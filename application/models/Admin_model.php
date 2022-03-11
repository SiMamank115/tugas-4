<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    public function getPartner($id = "", $pass = ""){
        $data = $this->db->query("SELECT * FROM admin WHERE id = ? AND pass = ?",array($id,$pass));
        return $data->result_array();
    }
}