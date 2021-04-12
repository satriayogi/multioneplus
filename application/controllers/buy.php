<?php

class Buy extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("customer/product_model","product");
        $params = array('server_key' => 'SB-Mid-server-sqtA0D0YzIqZj4KEvNpqyNQn', 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
    }
    public function index(){
        $data['customer'] = $this->product->viewcustomer()->row_array();
        $this->load->view("customer/transaksi/checkout1",$data);
    }
    public function token()
    {
		// $uri = $this->uri->segment(4);
		// $transaksi = $this->db->query("SELECT * FROM transaksi WHERE id_customer='$uri'")->row_array(); 
		// var_dump($transaksi);die;
		// Required
		$totalseluruh = $this->input->post('totalseluruh');
		// var_dump($totalseluruh);die;
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $totalseluruh, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 25000,
		  'quantity' => 1,
		  'name' => "Apple"
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => 25000,
		  'quantity' => 1,
		  'name' => "Orange"
		);

		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'email'         => "andri@litani.com",
		  'phone'         => "081122334455",
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
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }
    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }
}


?>