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
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list',$data);
        $this->load->view('admin/footer');
    }
    public function print_transaksi(){
        $data['print'] = $this->transaksi->print_transaksi();
        $this->load->view('admin/customer/print',$data);
    }
    public function update_transaksi(){
        $this->transaksi->update_transaksi();
    }
}


?>