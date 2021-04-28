<?php
class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('customer/profile_model','profile');
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/profile/profile',$data);
    }
    public function edit_profile(){
        $data['customer'] = $this->product->viewcustomer()->row_array();

        $this->load->view('customer/profile/edit_profile',$data);
    }
    public function save_profile(){
        // $nama= $this->input->post('nama');
        // $username= $this->input->post('username');
        // $notlp= $this->input->post('notlp');
        // $email= $this->input->post('email');
        // $tgl_lahir= $this->input->post('tgl_lahir');
        $this->profile->save_profile();
    }
}

?>