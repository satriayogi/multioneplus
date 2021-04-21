<?php 
class Product_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
    $this->load->model('customer/product_model','product');
    $this->load->model('admin/category_model','category');
        if (!$this->session->userdata('username') || !$this->session->userdata('email')) {
            redirect('loginc/customer');
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
        redirect('checkout/index');
    }
}
public function list_product(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['list_product'] = $this->product->list_product();
    $data['category']=$this->category->read_category();
    $this->load->view('customer/product/header',$data);
    $this->load->view('customer/product/list_product',$data);
}
public function add_keranjanglist(){
    $uri = $this->uri->segment(4);
}
public function category_product(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['category']=$this->category->read_category();
    $data['category_product'] = $this->product->category_product();
    $this->load->view('customer/product/header',$data);
    $this->load->view('customer/product/category_product',$data);
}
}



?>