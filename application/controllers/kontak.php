<?php 
class Kontak extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('admin/contact_model','contact');
        $this->load->model('admin/operator_model','operator');
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/kontak/contact',$data);
    }
    public function save_kontak(){
        $this->contact->save_kontak();
    }
    public function kontak_list(){
        $data['admin']= $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/kontak/kontak_list',$data);
        $this->load->view('admin/footer');
    }
}



?>