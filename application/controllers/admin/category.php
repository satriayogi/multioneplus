<?php 
class Category extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/category_model','category');
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
}
    public function index(){
        $data['admin']=$this->operator->viewadmin()->row_array();
        $data['category'] = $this->category->read_category();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/category/category_list',$data);
        $this->load->view('admin/footer');
    }
    public function save_category(){
        $this->category->save_category();
    }
}

