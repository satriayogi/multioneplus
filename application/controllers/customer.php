<?php 

class Customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/customer_model','customer');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['customer_list'] = $this->customer->customer_list();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/customer_list',$data);
        $this->load->view('admin/footer');
    }
    public function transaksi_customer_list(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list');
        $this->load->view('admin/footer');
    }
    public function update_status(){
        $this->customer->update_status();
    }
}


