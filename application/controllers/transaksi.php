<?php 
class Transaksi extends CI_Controller{
        public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator_model');
        $this->load->model('admin/transaksi_model','transaksi');
        if (!$this->session->userdata('username')) {
            redirect("auth/login");
        }
    }
    
    public function index(){
        $data['admin'] = $this->operator_model->viewadmin()->row_array();
        $data['transaksi'] = $this->transaksi->transaksi();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list',$data);
        $this->load->view('admin/footer');
    }
}


?>