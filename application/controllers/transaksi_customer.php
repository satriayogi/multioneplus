<?php 

class Transaksi_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('customer/transaksi_model','transaksi');
        if (! $this->session->userdata('username')) {
            redirect('loginc/customer');
        }elseif (!$this->session->userdata('email')) {
            redirect('loginc/customer');
            
        }
    }
    public function keranjang(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $data['keranjang'] = $this->transaksi->viewkeranjang();
        $this->load->view('customer/transaksi/transaksi',$data);
    }
    public function transaksi(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/transaksi/transaksi1',$data);
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
    public function riwayat_transaksi(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/transaksi/riwayat_transaksi',$data);
    }
    public function detail_transaksi(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $data['transaksi'] = $this->transaksi->detail_transaksi();
        $this->load->view('customer/transaksi/detail_transaksi',$data);
    }
    public function update_status(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->transaksi->update_status();
    $this->load->view('customer/product/header',$data);
    $this->load->view('customer/ratting/ratting.php');
    }
    public function save_ratting(){
        $this->transaksi->save_ratting();
    }
    public function json_cek(){
        $data = $this->transaksi->json_cek($_POST['id']);
        echo json_encode($data);
    }
}


?>