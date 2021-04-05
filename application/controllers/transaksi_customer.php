<?php 

class Transaksi_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('customer/transaksi_model','transaksi');
        if (! $this->session->userdata('username')) {
            redirect('login/customer');
        }elseif (!$this->session->userdata('email')) {
            redirect('login/customer');
            
        }
    }
    public function keranjang(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $data['keranjang'] = $this->transaksi->viewkeranjang();
        $this->load->view('customer/transaksi/transaksi',$data);
    }
    public function pluskeranjang(){
        $this->transaksi->pluskeranjang();
    }
    public function minkeranjang(){
        $this->transaksi->minkeranjang();
    }
    public function hapus_keranjang(){
        $this->transaksi->hapus_keranjang();
    }
}


?>