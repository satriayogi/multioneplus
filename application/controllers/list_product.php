<?php 
class List_product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('admin/category_model','category');
    }
    public function index(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['list_product'] = $this->product->list_product();
    $data['category']=$this->category->read_category();
    $this->load->view('customer/product/header',$data);
    $this->load->view('customer/product/list_product',$data);
    }
}


?>