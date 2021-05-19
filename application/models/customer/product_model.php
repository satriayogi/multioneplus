<?php 
class Product_model extends CI_Model{
    public function viewcustomer(){
        return $this->db->get_where('customer',['username'=>$this->session->userdata('username')]);
    }
    public function warni(){
        $warni = $this->input->post('warni');
        var_dump($warni);die;
    }
    public function detailproductrow(){
        $uri = $this->uri->segment(3);
      return  $this->db->get_where('product',['id'=>$uri])->row_array();
    }
    public function save_keranjang(){
    $warna = $this->input->post('warna');
    $warni = $this->input->post('warni_warni');
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
        'warna' =>$warni,
        'harga' => $harga,
        'catatan'=>$catatan,
        'total'=> $total
    ];
    // var_dump($data);die;
    $this->db->insert('keranjang',$data);
    // $id = $this->db->insert_id();
    // $result = array();
    // foreach ($warna as $key => $value) {
    //     $result[]=array(
    //         'id_keranjang' =>$id,
    //         'warna'=>$warna[$key],
    //     );
    // }
    // $this->db->insert_batch('keranjang_warna',$result);
}
public function list_product(){
    return $this->db->get('product')->result_array();
}
public function category_product(){
    $uri = $this->uri->segment(3);
    // var_dump($uri);die;
    return $this->db->query("SELECT * FROM product,category_product,category WHERE category.id='$uri' AND category_product.id_product=product.id AND category_product.id_category=category.id")->result_array();
}
}


?>