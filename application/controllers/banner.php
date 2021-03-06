<?php 
class Banner extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/product_model','product');
        $this->load->model('admin/discount_model','discount');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/banner/banner');
        $this->load->view('admin/footer');
    }
}




?>