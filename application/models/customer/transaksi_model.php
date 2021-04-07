<?php 
class transaksi_model extends CI_Model{
    public function viewkeranjang(){
        $uricustomer = $this->uri->segment(3);
        $this->db->select("*");
        $this->db->from("keranjang");
        $this->db->where("keranjang.id_customer",$uricustomer);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function minkeranjang(){
        $uricustomer = $this->uri->segment(3);
        $urikeranjang = $this->uri->segment(4);
        $this->db->query("UPDATE keranjang SET pcs=pcs-1,total=harga*pcs where id='$urikeranjang'");
        redirect('checkout/index');
    }
    public function pluskeranjang(){
        $uricustomer = $this->uri->segment(3);
        $urikeranjang = $this->uri->segment(4);

        $this->db->query("UPDATE keranjang SET pcs=pcs+1, total=harga*pcs where id='$urikeranjang'");
        redirect('checkout/index');
    }
    public function hapus_keranjang(){
        $urikeranjang = $this->uri->segment(3);
        $uriproduct = $this->uri->segment(4);
        $uricustomer = $this->uri->segment(5);
        $this->db->delete('keranjang',['id'=>$urikeranjang]);
        redirect('checkout/index');
    }
}


?>