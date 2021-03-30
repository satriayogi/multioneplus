<?php 
class Product_model extends CI_Model{
    public function viewcustomer(){
        return $this->db->get_where('customer',['username'=>$this->session->userdata('username')]);
    }
    public function detailproductrow(){
        $uri = $this->uri->segment(3);
      return  $this->db->get_where('product',['id'=>$uri])->row_array();
    }
    public function save_keranjang(){
    $warna = $this->input->post('warna');
    $pcs = $this->input->post('stok');
    $product = $this->input->post('product');
    $catatan = $this->input->post('catatan');
    $customer = $this->input->post('customer');
    $harga = $this->input->post('harga');
    $total = $this->input->post('total');
    // var_dump($warna);die;
    $data=[
        'id_customer' =>$customer,
        'id_product' =>$product,
        'pcs' =>$pcs,
        'harga' => $harga,
        'catatan'=>$catatan,
        'total'=> $total
    ];
    $this->db->insert('keranjang',$data);
    $id = $this->db->insert_id();
    $result = array();
    foreach ($warna as $key => $value) {
        $result[]=array(
            'id_keranjang' =>$id,
            'warna'=>$warna[$key],
        );
    }
    $this->db->insert_batch('keranjang_warna',$result);
    redirect('transaksi_customer/keranjang/'.$product.'/'.$customer);
}
}


?>