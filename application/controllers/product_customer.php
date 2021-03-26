<?php 
class Product_customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login/customer');
        }
    }
public function index(){

}
public function detail_product(){
    $this->load->view('customer/product/detail_product');
}
}



?>