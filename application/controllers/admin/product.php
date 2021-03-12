<?php 

class Product extends CI_Controller{
    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/product/product_list');
        $this->load->view('admin/footer');
    }
    public function product_list_detail(){
        $this->load->view('admin/header');
        $this->load->view('admin/product/product_list_detail');
        $this->load->view('admin/footer');
    }
    public function add_product(){
        $this->load->view('admin/header');
        $this->load->view('admin/product/add_product');
        $this->load->view('admin/footer');
    }
}

