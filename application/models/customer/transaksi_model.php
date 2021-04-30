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
        // var_dump($uricustomer);die;
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
        // var_dump($urikeranjang);die;
        $this->db->delete('keranjang',['id'=>$urikeranjang]);
        redirect('checkout/index');
    }
    public function save_transaksi(){
        $idkeranjang = $this->input->post("id_keranjang");
        $idcustomer = $this->input->post("id_customer");
        $alamat = $this->input->post("alamat");
        $kodepos = $this->input->post("kodepos");
        $provinsi = $this->input->post("provinsi");
        $kota = $this->input->post("kota");
        $ekpedisi = $this->input->post("ongkir");
        $kurir = $this->input->post("kurir");
        $pcs = $this->input->post("pcs");
        $hargaongkir = $this->input->post("hargaongkir");
        $ongkir = $this->input->post("ongkir");
        $discount = $this->input->post("discount");
        $totalseluruh = $this->input->post("totalseluruh");
        $kurirr = $this->input->post("kurirr");
        // looping warna
        $warna = $this->input->post("warna");
        // looping product
        $id_product = $this->input->post("id_product");
        $hargaproduct = $this->input->post("harga");
        $qty = $this->input->post("qty1");
        $totalproduct = $this->input->post("totalproduct");
        $data =[
            'id_customer'=>$idcustomer,
            'alamat'=>$alamat,
            'kodepos'=>$kodepos,
            'provinsi'=>$provinsi,
            'kota'=>$kota,
            'ekspedisi'=>$ekpedisi,
            'courier'=>$kurirr,
            'jenis_paket'=>$ongkir,
            'harga_kurir'=>$hargaongkir,
            'discount'=>$discount,
            'total'=>$totalseluruh
        ];
        $this->db->insert('transaksi',$data);
        $id_transaksi = $this->db->insert_id();
        // $id_transaksi = "1";
        $data2=array();
        $data1=array();
        foreach ($id_product as $key1 => $value1) {
            $data2[] = array(
                'id_transaksi'=>$id_transaksi,
                'id_product'=>$id_product[$key1],
                'pcs' =>$qty[$key1],
                'harga' =>$hargaproduct[$key1],
                'total' =>$totalproduct[$key1]

            );
            foreach ($warna as $key => $value) {
                $data1[]=array(
                'id_transaksi'=>$id_transaksi,
                'id_product'=>$id_product[$key1],
                'warna' =>$warna[$key]
                );
            }
        }
        $this->db->insert_batch('detail_transaksi',$data2);
        $this->db->insert_batch('detail_transaksiwarna',$data1);
        // $delte = array("keranjang","keranjang_warna");
        // $this->db->where('id',$idkeranjang);
        // $this->db->where('id_keranjang',$idkeranjang);
        foreach ($idkeranjang as $key3 => $value3) {
            $this->db->delete("keranjang",['id'=>$value3]);
            $this->db->delete("keranjang_warna",['id_keranjang'=>$value3]);
            
        }
        // $data2=array();
        // $index=0;
        // foreach ($id_product as $key) {
            //     array_push($data2,array(
                //                 'id_transaksi'=>$id_transaksi[$index],
                //                 'id_product'=>$key,
                //                 'pcs' =>$qty[$index],
                //                 'harga' =>$hargaproduct[$index],
                //                 'total' =>$totalseluruh[$index]
                //     ));
                //     var_dump($data2);die;
            
        // }
        // foreach ($warna as $key => $value) {
        //     $data1[] =array(
        //         'id_transaksi'=>$id_transaksi,
        //         'id_product'=>$id_product[$key],
        //         'warna' =>$warna[$key]
        //     );
            
        // }
        // var_dump($data1);die;
        // $this->db->insert_batch('detail_transaksiwarna',$data1);
        
    }
    public function customer_checkout(){
        $uri = $this->db->segment(3);
        return $this->db->get_where('transkasi',['id_customer'=>$uri])->row_array();
    }
    public function detail_transaksi(){
        $uri = $this->uri->segment(3);
        // var_dump($uri);die;
        return $this->db->get_where('transaksi',['id' => $uri])->row_array();
    }
}


?>