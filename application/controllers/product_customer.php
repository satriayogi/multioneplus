<?php 
class Product_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
    $this->load->model('customer/product_model','product');
        if (!$this->session->userdata('username') || !$this->session->userdata('email')) {
            redirect('login/customer');
        }
    }
public function index(){

}
public function detail_product(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['product_detail'] = $this->product->detailproductrow();
    $this->load->view('customer/product/product_detail',$data);
}
public function add_transaksi(){
    if (isset($_POST['keranjang'])) {
        $this->product->save_keranjang();
    }elseif (isset($_POST['beli'])) {
        $this->product->save_product();
        redirect('detaial');
    }
}
}



?>