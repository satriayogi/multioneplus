<?php 
class komentar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/komentar_model','komentar');
        if (!$this->session->userdata('username')) {
            redirect('loginc/customer');
        }
    }
    public function save_komentar(){
        $this->komentar->save_komentar();
    }
}


?>