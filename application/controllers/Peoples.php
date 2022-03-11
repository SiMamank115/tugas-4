<?php

class Peoples extends CI_Controller
{
    public function index($start = 1)
    {
        // die();
        $this->load->model("Peoples_model", "peoples");
        $this->load->library('pagination');
        $this->load->library('session');
        if($this->input->post("submit")) {
            $data["keyword"] = $this->input->post("keyword");
            $this->session->set_userdata("keyword",$data["keyword"]);
        } else {
            $data["keyword"] = $this->session->userdata("keyword");
        }
        $data['tittle'] = 'Daftar Orang';
        $data["pill"] = 3;
        $this->db->like("nama",$data["keyword"]);
        $this->db->from("peoples");
        $config["total_rows"] = $this->db->count_all_results();
        $data["total_rows"] = $config['total_rows'];
        $config["per_page"] = 8;
        $this->pagination->initialize($config);
        $data["start"] = $start;
        $data["peoples"] = $this->peoples->get($config["per_page"], $start, $data["keyword"]);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples', $data);
        $this->load->view('templates/footer');
    }
}
