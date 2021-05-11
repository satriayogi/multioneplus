<?php

class about extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("customer/product_model","product");
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/about/about',$data);
    }
}





?>