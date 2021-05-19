<?php 
class List_product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->model('admin/category_model','category');
    }
    public function index(){

    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['list_product'] = $this->product->list_product();
    $data['category']=$this->category->read_category();
    $ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
$s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
$ss = isset($s)?($s):0;
// Kalau belum ada, simpan data user tersebut ke database
if($ss == 0){
	$this->db->query("INSERT INTO visitor value('$ip','$date')");
	}
		// $data['kode'] = $this->KlienModel->kode();
		// $data['portfolio'] = $this->db->get('sub_portfolio')->result_array();
        $this->load->view('customer/product/header',$data);
        $this->load->view('customer/product/list_product',$data);
    
}
public function category_product(){
    $data['customer'] = $this->product->viewcustomer()->row_array();
    $data['list_product'] = $this->product->list_product();
        $data['category']=$this->category->read_category();
        $data['category_product'] = $this->product->category_product();
        $this->load->view('customer/product/header',$data);
        $this->load->view('customer/product/category_product',$data);
    }
}


?>