<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Peoples extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Peoples_model", "people");
    }
    public function index_get()
    {
        if ($this->get("query") != null) {
            $q = $this->get("query");
        } else $q = '';
        if ($this->get("limit") != null) {
            $limit = $this->get("limit");
        } else $limit = 10;
        if ($this->get("start") != null) {
            $start = $this->get("start");
        } else $start = 0;
        if ($start < 0 || $limit < 0) {
            $this->response([
                'status' => false,
                "message" => "Error input"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        $res = $this->people->get($limit, $start, $q);
        if ($res) {
            $this->response([
                'status' => true,
                'data' => $res
            ], REST_Controller::HTTP_OK);
        }
    }
    public function index_delete()
    {
        $id =  $this->delete("id");
        if ($id == null) {
            $this->response([
                'status' => false,
                "message" => "No ID provided"
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->people->del($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => "Deleted"
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    "message" => "ID not found"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post()
    {
        $data = [
            'id' => '',
            'nama' => $this->post("nama"),
            'address' => $this->post("address"),
            'email' => $this->post("email")
        ];
        if($this->people->add($data) > 0) {
            $this->response([
                'status' => true,
                'message' => "Added",
                'data' => $data
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => "Failed to add data",
                'data' => $data
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put() {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put("nama"),
            'address' => $this->put("address"),
            'email' => $this->put("email")
        ];
        if($this->people->edit($data,$id) > 0) {
            $this->response([
                'status' => true,
                'message' => "Edited",
                'data' => $data
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => "Failed to edit data",
                'data' => $data
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
