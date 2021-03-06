<?php 

class Discount extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/product_model','product');
        $this->load->model('admin/discount_model','discount');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
    }
    public function index(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['product'] = $this->product->read_product();
        $data['discount_list'] = $this->discount->discount_list();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/discount/discount_list',$data);
        $this->load->view('admin/footer');
    }
    public function save_discount(){
        $this->discount->save_discount();
    }
    public function delete_discount(){
        $this->discount->delete_discount();
    }
    public function json_diskon(){
        $uri = $this->input->post("diskontext");
       $data = $this->discount->json_diskon($uri);
        echo json_encode($data);
    }
}

