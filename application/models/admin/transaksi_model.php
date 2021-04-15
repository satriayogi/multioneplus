<?php 
class Transaksi_model extends CI_Model{
    public function transaksi(){
        $this->db->select("*");
        $this->db->from("customer");
        $this->db->join("transaksi","customer.id=transaksi.id_customer");
        $query = $this->db->get();
        return $query->result_array();
    }
}


?>