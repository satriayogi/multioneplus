<?php

class Buy extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("customer/product_model","product");
        $params = array('server_key' => 'SB-Mid-server-JxcoOpQw8TxjcCBt8mgspLwu', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view("customer/transaksi/checkout1",$data);
    }
	public function test(){
		$order_id = $this->input->post('result_data');
		$nama_customer = $this->input->post('nama_customer');
		$no_tlp = $this->input->post('no_tlp');
		$email =$this->input->post('email');
		$catatan = $this->input->post("catatan");
		$alamat = $this->input->post("alamat");
		$kodepos = $this->input->post("kodepos");
		$kota1 = $this->input->post("kota");
		$totalseluruh = $this->input->post("totalseluruh");
		$hargaongkir = $this->input->post("hargaongkir");
		$total_product = $this->input->post("total_product");
		$discount = $this->input->post("discount");
		$kurirr = $this->input->post("kurirr");
		$ekpedisi = $this->input->post("ekpedisi");
		$provinsi = $this->input->post("provinsi");
		$idkeranjang = $this->input->post("id_keranjang");

		$id_customer = $this->input->post("id_customer");
		$idwarna = $this->input->post("idwarna");

		// product
		$product = $this->input->post("id_product");
		$hargaproduct = $this->input->post("harga");
		$stok = $this->input->post("stok");
		$qty1 = $this->input->post("qty1");
		$totalproduct = $this->input->post("totalproduct");
		// delete keranjang
		// $this->db->query("DELETE FROM keranjang where id_customer='$id_customer'");
		// warna
		$warna = $this->input->post("warna");
		$id_warna = $this->input->post("id_warna");
		$data=[
			'id_customer'=>$id_customer,
			'id_order'=>$order_id,
			'alamat'=>$alamat,
			'kodepos'=>$kodepos,
			'provinsi'=>$provinsi,
			'kota'=>$kota1,
			'ekspedisi'=>$ekpedisi,
			'courier'=>$kurirr,
			'jenis_paket'=>$ekpedisi,
			'harga_kurir'=>$hargaongkir,
			'discount'=>$discount,
			'total'=>$totalseluruh

		];
		$this->db->insert('transaksi',$data);
		$id_transaksi = $this->db->insert_id();
		$result=array();
		$result1=array();
		$result2=array();
		$where1=array();
		$index=0;
		foreach ($product as $key => $value) {
			// $item = $stok - $qty1;
				$result[]= array(
					'id_transaksi'=>$id_transaksi,
					'id_product'=>$product[$key],
					'harga'=>$hargaproduct[$key],
					'pcs'=>$qty1[$key],
					'warna'=>$warna[$key],
					'catatan'=>$catatan[$key],
					'total_product'=>$totalproduct[$key]	
				);
				$result2[]=array(
					'id_product'=>$product[$key],
					'stok'=>$stok[$key],
					'id_stylecolor'=>$id_warna[$key]
				);
					
				
			}
// 			echo "<pre>";
// print_r($where1);
// echo "</pre>";
			// $h = array($where);
			// var_dump($result2);die;
			$this->db->where_in('id',$idwarna);
			$this->db->delete('warna');
			// foreach ($warna as $key1 => $value1) {
			// 	$result1[]=array(
			// 		'id_transaksi'=>$id_transaksi,
			// 		'id_product'=>$product[$key],
			// 		'warna'=>$warna[$key1]
			// 	);
				// var_dump($result2);die;
			// }
			// var_dump($result1);die;
			// $this->db->insert_batch('detail_transaksiwarna',$result1);
			$this->db->insert_batch('detail_transaksi',$result);
			$this->db->insert_batch('warna',$result2);
			// var_dump($result2);die;
			// $this->db->where('id_stylecolor',$id_warna);
			// $this->db->update_batch('warna',$result2,'id');
			// $result = json_decode($this->input->post('result_data'));
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;
	}
    public function token()
    {
		// $uri = $this->uri->segment(4);
		// $transaksi = $this->db->query("SELECT * FROM transaksi WHERE id_customer='$uri'")->row_array(); 
		// var_dump($transaksi);die;
		// Required
		// $totalseluruh = $this->input->post('totalseluruh');
		$nama_customer = $this->input->post('nama_customer');
		$no_tlp = $this->input->post('no_tlp');
		$email =$this->input->post('email');
		$alamat = $this->input->post("alamat");
		$kodepos = $this->input->post("kodepos");
		$kota1 = $this->input->post("kota");
		$totalseluruh = $this->input->post("totalseluruh");
		$hargaongkir = $this->input->post("hargaongkir");
		$total_product = $this->input->post("total_product");
		$discount = $this->input->post("discount");
		$kurirr = $this->input->post("kurirr");
		$ekspedisi = $this->input->post("ekspedisi");
		$provinsi = $this->input->post("provinsi");

		$id_customer = $this->input->post("id_customer");

		// product
		$product = $this->input->post("id_product");
		$hargaproduct = $this->input->post("hargaproduct");
		$qty1 = $this->input->post("qty1");
		$totalproduct = $this->input->post("totalproduct");

		// warna
		$warna = $this->input->post("warna");

		// $data=[
		// 	'id_customer'=>$id_customer,
		// 	'alamat'=>$alamat,
		// 	'kodepos'=>$kodepos,
		// 	'provinsi'=>$provinsi,
		// 	'kota'=>$kota1,
		// 	'ekspedisi'=>$ekspedisi,
		// 	'courier'=>$kurirr,
		// 	'jenis_paket'=>$ekspedisi,
		// 	'harga_kurir'=>$hargaongkir,

		// ];
		// $this->db->insert('transaksi',$data);
		// $id_transaksi = $this->db->insert_id();
		// var_dump($totalseluruh);die;
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $totalseluruh, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $total_product,
		  'quantity' => 1,
		  'name' => "Total Product"
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => $hargaongkir,
		  'quantity' => 1,
		  'name' => "Ongkos Kirim"
		);
		$item3_details = array(
		  'id' => 'a3',
		  'price' => -$discount,
		  'quantity' => 1,
		  'name' => "Discount"
		);

		// Optional
		$item_details = array ($item1_details, $item2_details, $item3_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "$nama_customer",
		  'last_name'     => "Litani",
		  'address'       => "$alamat",
		  'city'          => "$kota1",
		  'postal_code'   => "$kodepos",
		  'phone'         => "$no_tlp",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "$alamat",
		  'city'          => "$kota1",
		  'postal_code'   => "$kodepos",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "$nama_customer",
		  'email'         => "$email",
		  'phone'         => "$no_tlp",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
			'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }
    public function finish()
    {
		$order_id = $this->input->post('result_data');
		$nama_customer = $this->input->post('nama_customer');
		$no_tlp = $this->input->post('no_tlp');
		$email =$this->input->post('email');
		$catatan = $this->input->post("catatan");
		$alamat = $this->input->post("alamat");
		$kodepos = $this->input->post("kodepos");
		$kota1 = $this->input->post("kota");
		$totalseluruh = $this->input->post("totalseluruh");
		$hargaongkir = $this->input->post("hargaongkir");
		$total_product = $this->input->post("total_product");
		$discount = $this->input->post("discount");
		$kurirr = $this->input->post("kurirr");
		$ekpedisi = $this->input->post("ekpedisi");
		$provinsi = $this->input->post("provinsi");
		$idkeranjang = $this->input->post("id_keranjang");

		$id_customer = $this->input->post("id_customer");
		$idwarna = $this->input->post("idwarna");

		// product
		$product = $this->input->post("id_product");
		$hargaproduct = $this->input->post("harga");
		$stok = $this->input->post("stok");
		$qty1 = $this->input->post("qty1");
		$totalproduct = $this->input->post("totalproduct");
		// delete keranjang
		$this->db->query("DELETE FROM keranjang where id_customer='$id_customer'");
		// warna
		$warna = $this->input->post("warna");
		$id_warna = $this->input->post("id_warna");
		$data=[
			'id_customer'=>$id_customer,
			'id_order'=>$order_id,
			'alamat'=>$alamat,
			'kodepos'=>$kodepos,
			'provinsi'=>$provinsi,
			'kota'=>$kota1,
			'ekspedisi'=>$ekpedisi,
			'courier'=>$kurirr,
			'jenis_paket'=>$ekpedisi,
			'harga_kurir'=>$hargaongkir,
			'discount'=>$discount,
			'total'=>$totalseluruh

		];
		$this->db->insert('transaksi',$data);
		$id_transaksi = $this->db->insert_id();
		$result=array();
		$result1=array();
		$result2=array();
		$where1=array();
		$index=0;
		foreach ($product as $key => $value) {
			// $item = $stok - $qty1;
				$result[]= array(
					'id_transaksi'=>$id_transaksi,
					'id_product'=>$product[$key],
					'harga'=>$hargaproduct[$key],
					'pcs'=>$qty1[$key],
					'warna'=>$warna[$key],
					'catatan'=>$catatan[$key],
					'total_product'=>$totalproduct[$key]	
				);
				$result2[]=array(
					'id_product'=>$product[$key],
					'stok'=>$stok[$key],
					'id_stylecolor'=>$id_warna[$key]
				);
					
				
			}
// 			echo "<pre>";
// print_r($where1);
// echo "</pre>";
			// $h = array($where);
			// var_dump($result2);die;
			$this->db->where_in('id',$idwarna);
			$this->db->delete('warna');
			// foreach ($warna as $key1 => $value1) {
			// 	$result1[]=array(
			// 		'id_transaksi'=>$id_transaksi,
			// 		'id_product'=>$product[$key],
			// 		'warna'=>$warna[$key1]
			// 	);
				// var_dump($result2);die;
			// }
			// var_dump($result1);die;
			// $this->db->insert_batch('detail_transaksiwarna',$result1);
			$this->db->insert_batch('detail_transaksi',$result);
			$this->db->insert_batch('warna',$result2);
			// var_dump($result2);die;
			// $this->db->where('id_stylecolor',$id_warna);
			// $this->db->update_batch('warna',$result2,'id');
			// $result = json_decode($this->input->post('result_data'));
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;
		redirect("transaksi_customer/detail_transaksi/".$id_transaksi);

    }
}


?>