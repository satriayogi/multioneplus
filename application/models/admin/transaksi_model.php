<?php 
class Transaksi_model extends CI_Model{
    public function transaksi(){
        $this->db->select("*");
        $this->db->from("customer");
        $this->db->join("transaksi","customer.id=transaksi.id_customer");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function print(){
        $uri = $this->uri->segment(3);
        return $this->db->get_where("transaksi",['id'=>$uri])->row_array();
        // var_dump($uri);die;
    }
    public function update_transaksi(){
        $id = $this->input->post('id');
        $id_customer = $this->input->post('id_customer');
        $id_order = $this->input->post('id_order');
        $kodepos = $this->input->post('kodepos');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $ekspedisi = $this->input->post('ekspedisi');
        $courier = $this->input->post('courier');
        $jenis_paket = $this->input->post('jenis_paket');
        $harga_kurir = $this->input->post('harga_kurir');
        $discount = $this->input->post('discount');
        $total = $this->input->post('total');
        $alamat = $this->input->post('alamat');
        $noresi = $this->input->post('noresi');

        $this->db->query("UPDATE transaksi SET 
        id_customer = '$id_customer',
        id_order = '$id_order',
        alamat = '$alamat',
        kodepos = '$kodepos',
        provinsi = '$provinsi',
        kota = '$kota',
        ekspedisi = '$ekspedisi',
        courier = '$courier',
        jenis_paket = '$jenis_paket',
        no_resi = '$noresi',
        harga_kurir = '$harga_kurir',
        discount = '$discount',
        total = '$total'
        WHERE id='$id'
        ");
    }
}


?>