<?php 
class Komentar_model extends CI_Model{
    public function save_komentar(){
        $product = $this->input->post('product');
        $customer = $this->input->post('customer');
        $komen = $this->input->post('komen');
        $rating = $this->input->post('rating');
        $data= [
            'id_product'=>$product,
            'id_customer'=>$customer,
            'komen'=>$komen,
            'ratting'=>$rating
        ];
        $this->db->insert('komentar',$data);
        redirect('product_customer/detail_product/'.$product.'/'.$customer);
    }
}


?>