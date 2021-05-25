<?php 

class Slideshow extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/slideshow_model','slideshow');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['slide'] = $this->slideshow->slideshow();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/slideshow/slideshow');
        $this->load->view('admin/footer');
    }
    public function save_slideshow(){
            $this->slideshow->save_slideshow();
    }
    public function update_slideshow(){
        $this->slideshow->update_slideshow();
    }
    public function hapus_slide(){
        $uri =  $this->uri->segment(4);
        // var_dump($uri);die;
        $this->db->delete('slideshow',['id'=>$uri]);
        redirect('slideshow/index');
    }
}


?>