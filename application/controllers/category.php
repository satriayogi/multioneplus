<?php 
class Category extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/category_model','category');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
}
    public function index(){
        $data['admin']=$this->operator->viewadmin()->row_array();
        $data['category']=$this->category->read_category();
        $data['category1']=$this->category->read_category();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/category/category_list',$data);
        $this->load->view('admin/footer');
    }
    public function jsoncategory(){
        $data = $this->category->read_category();
        echo json_encode($data);
    }
    public function save_category(){
        $this->category->save_category();
    }
    public function delete_category(){
        $this->category->delete_category();
    }
    public function sub_category(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['category'] = $this->category->read_category();
        $data['subcategory'] = $this->category->read_subcategory();
        $data['subcategory1'] = $this->category->read_subcategory();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/category/subcategory',$data);
        $this->load->view('admin/footer');
    }
    public function save_subcategory(){
        $this->category->save_subcategory();
    }
    public function update_category(){
        $this->category->update_category();
    }
    public function update_subcategory(){
        $this->category->update_subcategory();
    }
}

