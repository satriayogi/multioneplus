<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Operator extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
}

    public function index(){
        $data['operator_list'] = $this->operator->read_operator();
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/operator/operator_list',$data);
        $this->load->view('admin/footer');
    }
    public function add_operator(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/operator/add_operator');
        $this->load->view('admin/footer');
    }
    public function save_operator(){
        $this->form_validation->set_rules('nama','Name Is','required');
        $this->form_validation->set_rules('alamat','Alamat Is','required');
        $this->form_validation->set_rules('username','Username Is','required');
        $this->form_validation->set_rules('email','Email Is','required');
        $this->form_validation->set_rules('no_tlp','No Telephone Is','required');
        $this->form_validation->set_rules('password','Password Is','required');
        if ($this->form_validation->run() == false) {
            redirect('admin/operator/add_operator');
        }else {
            $this->operator->save_operator();
        }
    }
    public function edit_operator(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['operator']= $this->operator->edit_operator();
        $this->load->view('admin/header',$data);
    $this->load->view('admin/operator/update_operator',$data);
    $this->load->view('admin/footer');
    
}
public function update_operator(){
    $this->operator->update_operator();
}
public function delete_operator(){
    $this->operator->delete_operator();
}



public function log_operator(){
    $data['admin'] = $this->operator->viewadmin()->row_array();
    $this->load->view('admin/header',$data);
    $this->load->view('admin/operator/log_operator');
    $this->load->view('admin/footer');
}
}

