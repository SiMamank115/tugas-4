<?php
class Peoples_model extends CI_Model
{
    public function get($limit, $start, $keyword = null)
    {
        if ($keyword != null) {
            echo 1;
            $this->db->like("nama", $keyword);
        }
        return $this->db->get("peoples", $limit, $start)->result_array();
    }
    public function count()
    {
        return $this->db->get("peoples")->num_rows();
    }
    public function del($id) {
        $this->db->delete("peoples",['id' => $id]);
        return $this->db->affected_rows();
    }
    public function add($data) {
        $this->db->insert('peoples',$data);
        return $this->db->affected_rows();
    }
    public function edit($data,$id) {
        $this->db->update('peoples',$data,['id' => $id]);
        return $this->db->affected_rows();
    }
}
