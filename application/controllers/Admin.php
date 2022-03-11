<?php
class Admin extends CI_Controller
{
    public function index()
    {
        if (isset($_POST["tambah"])) {
            $data["id"] = $this->input->post("id");
            $data["nama"] = $this->input->post("nama");
            $data["tanggal_lahir"] = $this->input->post("tanggal_lahir");
            $data["pekerjaan"] = $this->input->post("pekerjaan");
            $data["hobi"] = $this->input->post("hobi");
            $data["moto"] = $this->input->post("moto");
            $this->db->query($this->db->set($data)->get_compiled_insert("partner"));
            header("Location:" . base_url() . "admin?id=" . $_POST["user_id"] . "&pass=" . $_POST["user_pass"]);
            die();
        } else if (isset($_GET["id"]) && isset($_GET["pass"])) {
            $this->load->model("Admin_model");
            $e = $this->Admin_model->getPartner($_GET["id"], $_GET["pass"]);
            if (isset($e[0])) {
                $data["tittle"] = "Halaman Admin";
                $data["pill"] = 4;
                $data["data"] = $this->db->query("SELECT * FROM partner")->result_array();
                $this->load->view("templates/header", $data);
                $this->load->view("admin", $data);
                $this->load->view("templates/footer", $data);
            } else {
                $data["heading"] = "No user found";
                $data["message"] = "<p>The input doens't match with any user</p>";
                $this->load->view("errors/html/error_general.php", $data);
            };
        } else {
            $data["heading"] = "404 Page Not Found";
            $data["message"] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404.php", $data);
        }
    }
    public function hapus($id) {
        var_dump($id);
        echo $this->db->delete("partner",array("id" => $id));
        header("Location:" . base_url() . "admin?id=" . $_GET["id"] . "&pass=" . $_GET["pass"]);
        die();
    }
}
