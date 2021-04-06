<?php 
class Checkout extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('customer/product_model','product');
        $this->load->library('ongkir');
        // $this->load->model('customer/checkout_model','checkout');
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view('customer/transaksi/checkout',$data);
    }
   
    public function provinsi(){
        $provinsi = $this->ongkir->api_ongkir('province');
        $data = json_decode($provinsi,true);
        echo json_encode($data['rajaongkir']['results']);
    }
    public function city($provinsi=""){
       if (!empty($provinsi)) {
           if (is_numeric($provinsi)) {
               $kota = $this->ongkir->api_ongkir('city?province='.$provinsi);
               $data = json_decode($kota,true);
               echo json_encode($data['rajaongkir']['results']);
           }
       }
    }
    public function tarif($option,$qty){
        $berat = $qty*1000;
        $tarif = $this->ongkir->api_ongkirpost($option,$qty);
        $data = json_decode($tarif,true);
        echo json_encode($data['rajaongkir']['results']);
    }
}


?>