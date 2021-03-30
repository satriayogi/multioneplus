<?php 
class komentar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/komentar_model','komentar');
    }
    public function save_komentar(){
        $this->komentar->save_komentar();
    }
}


?>