<?php 
class Category extends CI_Controller{
    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/category/category_list');
        $this->load->view('admin/footer');
    }
}

