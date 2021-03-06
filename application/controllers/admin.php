<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin']= $this->operator_model->viewadmin()->row_array();
        $data['count_bulanan']= $this->operator_model->total_bulanan();
        $data['totalbulan']= $this->operator_model->total_bulan();
        $data['jumlahbulan']= $this->operator_model->jumlah_perbulan();
        $data['jml']= $this->operator_model->count_data();
        $data['jml_transaksi']= $this->operator_model->jml_transaksi();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer',$data);
    }


}


