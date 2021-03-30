<?php 
class transaksi_model extends CI_Model{
    public function viewkeranjang(){
        $uricustomer = $this->uri->segment(4);
        $this->db->select("*");
        $this->db->from("keranjang");
        $this->db->where("keranjang.id_customer",$uricustomer);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function min(){
        $pcs = $this->input->post('pcs');
        $keranjang = $this->input->post('id_keranjang');
        $id_product = $this->input->post('id_product');
        $id_customer = $this->input->post('id_customer');
        $this->db->query("UPDATE keranjang SET pcs=$pcs-1 where id='$keranjang'");
        redirect('transaksi_customer/keranjang/'.$id_product.'/'.$id_customer);
    }
    public function plus(){
        $pcs = $this->input->post('pcs');
        $keranjang = $this->input->post('id_keranjang');
        $id_product = $this->input->post('id_product');
        $id_customer = $this->input->post('id_customer');
        $this->db->query("UPDATE keranjang SET pcs=$pcs+1 where id='$keranjang'");
        redirect('transaksi_customer/keranjang/'.$id_product.'/'.$id_customer);
    }
    public function hapus_keranjang(){
        $urikeranjang = $this->uri->segment(3);
        $uriproduct = $this->uri->segment(4);
        $uricustomer = $this->uri->segment(5);
        $this->db->delete('keranjang',['id'=>$urikeranjang]);
        redirect('transaksi_customer/keranjang/'.$uriproduct.'/'.$uricustomer);
    }
}


?>