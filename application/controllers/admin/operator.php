<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Operator extends CI_Controller{
    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/operator/operator_list');
        $this->load->view('admin/footer');
    }
    public function add_operator(){
        $this->load->view('admin/header');
        $this->load->view('admin/operator/add_operator');
        $this->load->view('admin/footer');
    }
    public function log_operator(){
        $this->load->view('admin/header');
        $this->load->view('admin/operator/log_operator');
        $this->load->view('admin/footer');
    }
}

