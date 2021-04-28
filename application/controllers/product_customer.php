<?php 
class Product_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
    $this->load->model('customer/product_model','product');
    $this->load->model('admin/category_model','category');
       
    }
public function index(){

}
public function detail_product(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['product_detail'] = $this->product->detailproductrow();
    $this->load->view('customer/product/product_detail',$data);
}
public function add_transaksi(){
    if (! $this->session->userdata('username')) {
        redirect('loginc/customer');
    }elseif (!$this->session->userdata('email')) {
        redirect('loginc/customer');
        
    }else{
        if (isset($_POST['keranjang'])) {
            $this->product->save_keranjang();
            redirect('list_product/index');
            
        }elseif (isset($_POST['beli'])) {
            $this->product->save_keranjang();
            redirect('checkout/index');
        }

    }
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