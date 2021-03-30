<?php 

class Transaksi_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('customer/transaksi_model','transaksi');
    }
    public function keranjang(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $data['keranjang'] = $this->transaksi->viewkeranjang();
        $this->load->view('customer/transaksi/transaksi',$data);
    }
    public function updatekeranjang(){
        if (isset($_POST['min'])) {
            $this->transaksi->min();
        }
        if (isset($_POST['plus'])) {
            $this->transaksi->plus();
        }
    }
    public function hapus_keranjang(){
        $this->transaksi->hapus_keranjang();
    }
}


?>