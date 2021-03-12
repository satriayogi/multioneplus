<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{

    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }


}


