<?php

class About extends CI_Controller
{
    public function index()
    {
        $this->load->model("Partner_model");
        $data["tittle"] = "About me";
        $data["pill"] = 2;
        $data["youtube"] = http_request("https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2Cstatistics&id=UCJ5fpX0tzcCzX0o04M_zr5Q&key=AIzaSyB0-xs4NZSi0BNq_WdUsboBeBGUx7x5AKA");
        $data["youtube"] = json_decode($data["youtube"], TRUE)["items"][0];
        $data["url_video"] = http_request("https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyB0-xs4NZSi0BNq_WdUsboBeBGUx7x5AKA&channelId=UCJ5fpX0tzcCzX0o04M_zr5Q&maxResult=1&order=date");
        $data["url_video"] = json_decode($data["url_video"],TRUE)["items"][0]["id"]["videoId"];
        $this->load->view("templates/header", $data);
        $this->load->view("about", $data);
        $this->load->view("templates/footer", $data);
    }
}