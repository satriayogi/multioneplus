<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
    }
    public function index(){
        $data['admin']= $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }


}


