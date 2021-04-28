<?php 
class Transaksi extends CI_Controller{
        public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator_model');
        $this->load->model('admin/transaksi_model','transaksi');
        if (!$this->session->userdata('username')) {
            redirect("login/admin");
        }
    }
    
    public function index(){
        $data['admin'] = $this->operator_model->viewadmin()->row_array();
        $data['transaksi'] = $this->transaksi->transaksi();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list',$data);
        $this->load->view('admin/footer');
    }
    public function print(){
        $data['print'] = $this->transaksi->print();
        $this->load->view('admin/customer/print',$data);
    }
    public function update_transaksi(){
        $this->transaksi->update_transaksi();
    }
}


?>