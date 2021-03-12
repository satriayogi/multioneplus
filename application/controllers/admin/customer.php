<?php 

class Customer extends CI_Controller{
    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/customer/customer_list');
        $this->load->view('admin/footer');
    }
    public function transaksi_customer_list(){
        $this->load->view('admin/header');
        $this->load->view('admin/customer/transaksi_customer_list');
        $this->load->view('admin/footer');
    }
}


