<?php
class Register extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/register_model','register');
    }
    public function index(){
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');
        if ($this->form_validation->run()==false) {
            $this->load->view('customer/auth/register');
        }else{
            $this->register->save_register();
        }
    }
}

?>