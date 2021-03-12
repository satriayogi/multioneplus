<?php 

class Discount extends CI_Controller{
    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/discount/discount_list');
        $this->load->view('admin/footer');
    }
}

