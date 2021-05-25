<?php 

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/product_model','product');
        if (!$this->session->userdata('username')) {
            redirect('login/index');
        }
}
    public function index(){
        $data['admin']= $this->operator->viewadmin()->row_array();
        $data['product'] = $this->product->read_product();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/product_list',$data);
        $this->load->view('admin/footer');
    }
    public function product_list_detail(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/product_list_detail');
        $this->load->view('admin/footer');
    }
    public function add_product(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['category'] = $this->product->readcategory();
        $data['color_list'] = $this->product->color_list();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/add_product',$data);
        $this->load->view('admin/footer');
    }
    public function save_product(){
        $this->product->save_product();
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your product has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('product/index');
    }
    public function delete_product(){
        $this->product->delete_product();
        redirect('product/index');
    }
    public function edit_product(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['category'] = $this->product->readcategory();
        $data['stok'] = $this->product->stok();
        $data['color_list'] = $this->product->color_list();
        $data['edit'] = $this->product->read_productrow();
        $data['editcategory'] = $this->product->editcategory();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/edit_product',$data);
        $this->load->view('admin/footer');       
    }
    public function update_product(){
        $this->product->update_product();
    }
    public function color_list(){
        $data['admin']= $this->operator->viewadmin()->row_array();
        $data['color_list'] = $this->product->color_list();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $data['tot_message'] = $this->operator_model->tot_message();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/color_list',$data);
        $this->load->view('admin/footer');
    }
    public function save_color(){
        $this->product->save_color();
    }
    public function update_color(){
        $this->product->update_color();

    }

    
}

