<?php 

class Customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/customer_list');
        $this->load->view('admin/footer');
    }
    public function transaksi_customer_list(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list');
        $this->load->view('admin/footer');
    }
}


